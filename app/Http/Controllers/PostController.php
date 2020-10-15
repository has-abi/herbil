<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Album;
use App\Models\Attachement;
use App\Models\Categorie;
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
        $thumbnail = DB::table('thumbnails')->where('post_id','=',$id)->get('*');
        $data = $thumbnail[0]->file;
        return \Illuminate\Support\Facades\Response::make($data, 200, array('Content-type' => 'image/'.$thumbnail[0]->extension, 'Content-length' => $thumbnail[0]->size));
    }
    public function getAlbumImage($id){
        $image = DB::table('albums')->find($id);
        $data = $image->file;
        return \Illuminate\Support\Facades\Response::make($data, 200, array('Content-type' => 'image/'.$image->extension, 'Content-length' => $image->size));
    }

    public function getAttachement($id){
        $attachement = DB::table('attachements')->find($id);
        $data = $attachement->file;
        return \Illuminate\Support\Facades\Response::make($data, 200, array('Content-type' => 'image/'.$attachement->extension, 'Content-length' => $attachement->size));

    }
    public function byCategorie(Request $request){
        $cat = $request->get('c');
        $result = DB::table('posts')
            ->join('categorie_post','categorie_post.post_id','=','posts.id')
            ->join('categories','categories.id','=','categorie_post.categorie_id')
            ->where('categories.libelle','=',$cat)
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
        $posts = Post::orderBy('created_at','ASC')->paginate(8);
        $innerPost =Post::orderBy('id','desc')->first();
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
            $thumbnail = new Thumbnail;
            $file = $request->file('thumbnail');
            $thumbnail = $this->createFile($thumbnail,$file);
            $thumbnail->post_id = $post->id;
            $thumbnail->save();
        }
       //$categories = DB::table('categories')->find();

           $post->categories()->attach($request->get('categorie'));

        if($request->hasFile("attachement")){
            foreach ($request->file('attachement') as $file){
                $attachement = new Attachement;
                $attachement = $this->createFile($attachement,$file);
                $attachement->post_id = $post->id;
                $attachement->save();
            }
        }
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file){
                $image = new Album;
                $image = $this->createFile($image,$file);
                $image->post_id = $post->id;
                $image->save();
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
            return view("posts.edit")->with(["post"=>$post,"categories"=>$categories]);
        }
        return view("auth.login")->with("error","ليست لديك صلاحية الدخول!  المرجوا إدخال معلومات حسابك.");

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'

        ]);
        $post = DB::table('posts')->find($id);
        $title = $request->get("title");

        $content = $request->get("content");
        $attachement = $post->attachement;
        if($request->hasFile("attachement")){
            $originName = $request->file('attachement')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('attachement')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('attachement')->move(public_path('files/attachement'), $fileName);
            $attachement = $fileName;
        }
        DB::table('posts')->where(["id"=>$id])->update(
            [
                'title'=>$title,
                'content'=>$content,
                'attachement'=>$attachement,
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
                $albumImages = DB::table('albums')->where(['post_id'=>$id])->get('*');
                $attachements = DB::table('attachements')->where(['post_id'=>$id])->get('*');
                if ($albumImages->count()>0){
                    foreach ($albumImages as $image){
                        File::delete('files/album/'.$image->url);
                        DB::table('albums')->delete($image->id);
                    }
                }
                if($attachements->count()>0){
                    foreach ($attachements as  $attachement){
                        File::delete('files/attachement/'.$attachement->url);
                        DB::table('attachements')->delete($attachement->id);
                    }
                }
                File::delete('files/thumbnail/'.$post->thumbnail);
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

    public function createFile($object,$file){
        $fileName = $this->createFileName($file);
        $object->size = $file->getSize();
        $object->extension = $file->getClientOriginalExtension();
        $object->name = $fileName;
        $object->file = $file->openFile()->fread($file->getSize());
        return $object;

    }
}
