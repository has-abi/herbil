<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Album;
use App\Models\Attachement;
use App\Models\Categorie;
use App\Models\CategoriePost;
use App\Models\Post;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function  getThumbnail($id){
        $this->getFile($id,"thumbnails");
    }
    public function getAlbumImage($id){
        $this->getFile($id,"albums",$id);
    }

    public function getAttachement($id){
        $this->getFile($id,"albums",$id);
    }
    public function byCategorie(Request $request){
        $cat = $request->get('c');
        $result = DB::table('posts')
            ->join('categorie_post','categorie_post.post_id','=','posts.id')
            ->join('categories','categories.id','=','categorie_post.categorie_id')
            ->where('categories.libelle','=',$cat)
            ->where('posts.status','=',true)
            ->select('posts.*')
            ->distinct('posts.id')->paginate(9,['posts.*']);
        if(!Session::exists('search_cat')){
            \session()->put('search_cat',$cat);
        }
        return view('categorie')->with([
            'posts'=>$result
        ]);
    }

    public function  chercher(Request $request){
        $s = $request->get('m');
        $result = DB::table('posts')
                        ->join('categorie_post','categorie_post.post_id','=','posts.id')
                        ->join('categories','categories.id','=','categorie_post.categorie_id')
                        ->where('posts.title','like','%'.$s.'%')
                         ->where('posts.status','=',true)
                        ->orWhere('categories.libelle','=',$s)
                        ->select('posts.*')
                       ->distinct('posts.id')->paginate(9,['posts.*']);
                if(!Session::exists('search_word')){
                    \session()->put('search_word',$s);
                }
        return view('search')->with([
            'posts'=>$result,
            ]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at','ASC')->where(['status'=>true])->paginate(8);
        $innerPost =Post::orderBy('id','desc')->where(['status'=>true])->first();
        $videos = DB::table('videos')->orderBy('created_at','ASC')->limit(5)->get('*');
        $count = $posts->count();
        return view("welcome")->with([
            'posts'=>$posts,
            'innerPost'=>$innerPost,
            'count'=>$count,
            'videos'=>$videos
        ]);
    }

    public function getAll(){
        $posts = Post::orderBy('created_at','ASC')->paginate(8);
        return view('posts.index')->with(compact('posts'));
    }

    public function create()
    {
        if(Auth::check()){
            notify()->success("success");

            $categories = Categorie::all();
            return view("posts.create")->with('categories',$categories);
        }
        return view("auth.login")->with("error","ليست لديك صلاحية الدخول!  المرجوا إدخال معلومات حسابك.");
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'required|image',
            'categorie'=>'required'
        ]);
        $post = new Post;

        $post->title = $request->get('title');
        $post->content = $request->get("content");

        $post->status = true;
        $post->save();
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $this->insertFile($post->id,$file,"thumbnails");
        }
           $post->categories()->attach($request->get('categorie'));

        if($request->hasFile("attachement")){
            foreach ($request->file('attachement') as $file){
                $this->insertFile($post->id,$file,"attachements");
            }
        }
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file){
                $this->insertFile($post->id,$file,"albums");
            }
        }
            notify()->success("تم نشر المقال بنجاح");
            return redirect("posts/create");

        //else $request->session()->flash("error","تعذر نشر المقال المرجوا المحاولة من جديد!");

    }

    public function upload(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('files'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('files/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }


    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        if(isset($post)){
            $keywords = StringHelper::keywords($post->title);
            $content = Str::limit(htmlspecialchars($post->content),100);
            $attachements = DB::table('attachements')->where(['post_id'=>$id])->get('*');
            $photos = DB::table('albums')->where(['post_id'=>$id])->get('*');

            return view("posts.show")->with([
                'post'=>$post,
                'attachements'=>$attachements,
                'photos'=>$photos,
                'keywords'=>$keywords,
                'content'=>$content
            ]);
        }
        else return redirect("/");

    }


    public function edit($id)
    {
        if(Auth::check()){
            $categories = Categorie::all();
            $post = Post::find($id);
            $thumb = DB::table('thumbnails')->where(['post_id'=>$id])->get("*");
            return view("posts.edit")->with(["post"=>$post,"categories"=>$categories,"thumb"=>$thumb[0]]);
        }
        return view("auth.login")->with("error","ليست لديك صلاحية الدخول!  المرجوا إدخال معلومات حسابك.");

    }


    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $id = $request->get('post_id');
        $post = Post::with('categories')->find($id);
        $title = $request->get("title");
        $content = $request->get("content");
        if($request->hasFile("thumbnail")){
            DB::table('thumbnails')->where(['post_id'=>$post->id])->delete();
            $this->insertFile($post->id,$request->file('thumbnail'),"thumbnails");
        }

            foreach($post->categories as $pc){
                if(!in_array($pc->id,$request->get('categorie'))){
                    DB::table('categorie_post')->where(['categorie_id'=>$pc->id])->delete();
                }
            }

            foreach ($request->get('categorie') as $c){
                if(!in_array($c,\App\Helpers\DataHelper::catsToArray($post->categories))){
                    $pdo = DB::connection()->getPdo();
                    $sql = "INSERT INTO categorie_post (post_id,categorie_id) VALUES (:post_id,:categorie_id)";
                    $stm = $pdo->prepare($sql);
                    $stm->execute([
                        ':post_id'=>$post->id,
                        ':categorie_id'=>$c
                    ]);
                }
            }


        DB::table('posts')->where(["id"=>$id])->update(
            [
                'title'=>$title,
                'content'=>$content,
            ]
        );
        notify()->success("تم تعديل المقال بنجاح");
        return  redirect("admin/posts_table");
    }



    public function destroy($id)
    {
        if(Auth::check()){
            $post = DB::table('posts')->find($id);
            if(isset($post)){
                $albumImages = DB::table('albums')->where(['post_id'=>$id])->get('id');
                $attachements = DB::table('attachements')->where(['post_id'=>$id])->get('id');
                if ($albumImages->count()>0){
                    foreach ($albumImages as $image){
                        DB::table('albums')->delete($image->id);
                    }
                }
                if($attachements->count()>0){
                    foreach ($attachements as  $attachement){
                        DB::table('attachements')->delete($attachement->id);
                    }
                }
               $thum = DB::table('thumbnails')->where(['post_id'=>$id])->get('id');
                DB::table('thumbnails')->delete($thum[0]->id);

                DB::table('posts')->delete($id);

            notify()->success("تم حذف المقال بنجاح");
            }else{
                notify()->error('Error');
            }

        }
        return view("auth.login")->with("error","ليست لديك صلاحية الدخول!  المرجوا إدخال معلومات حسابك.");

    }

    public function createFileName($file){
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        return $fileName;
    }



    public function insertFile($post_id,$file,$table){

        $sql = "INSERT INTO ".$table."(size,extension,name,post_id,file) "
            . "VALUES(:size,:extension,:name,:post_id,:file)";
        $pdo = DB::connection()->getPdo();
        try {
            $pdo->beginTransaction();
            $pathToFile = $file->getRealPath();
            // create large object
            $fileData = $pdo->pgsqlLOBCreate();
            $stream = $pdo->pgsqlLOBOpen($fileData, 'w');

            // read data from the file and copy the the stream
            $fh = fopen($pathToFile, 'rb');
            stream_copy_to_stream($fh, $stream);
            //
            $fh = null;
            $stream = null;

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':size' => $file->getSize(),
                ':extension' => $file->getClientOriginalExtension(),
                ':name' =>  $this->createFileName($file),
                ':post_id' => $post_id,
                ':file'=>$fileData
            ]);

            // commit the transactions
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBack();
            throw $e;
        }

    }

    public function getFile($id,$table,$altId = 0){
        $pdo = DB::connection()->getPdo();
        $pdo->beginTransaction();
        if($altId == 0){
            $stmt = $pdo->prepare("SELECT id, file, extension "
                . "FROM ".$table
                . " WHERE post_id = :id");
        }else{
            $stmt = $pdo->prepare("SELECT id, file, extension "
                . "FROM ".$table
                . " WHERE id = :id");
        }


        // query blob from the database
        $stmt->execute([$id]);
        $fileData = "";
        $ext = "";
        $stmt->bindColumn('file', $fileData, $pdo::PARAM_STR);
        $stmt->bindColumn('extension', $ext, $pdo::PARAM_STR);
        $stmt->fetch(\PDO::FETCH_BOUND);
        $stream = $pdo->pgsqlLOBOpen($fileData, 'r');

        // output the file
        header("Content-type: image/" . $ext);
        fpassthru($stream);
    }
}
