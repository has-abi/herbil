<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index(){
        $videos = DB::table('videos')->paginate(6);
        return view("admin.videos_table")->with("videos",$videos);
    }


    public function create(){
        if(Auth::check()){
            return view("videos.add");
        }
        return  redirect("login");
    }

    public function store(Request $request){
        $request->validate([
           'title'=>'required',
           'url'=>'required'
        ]);
        $video = new Video;
        $video->title = $request->get('title');
        $video->url = $request->get('url');
        if($video->save()){
            notify()->success("تم نشر الفيديوا بنجاح");
            return redirect("admin/videos_table");
        }
        else return redirect("video/add");
    }

    public function edit($id){
        if(Auth::check()){
            $v = DB::table('videos')->find($id);
            return view("videos.edit")->with("v",$v);
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'url'=>'required',

        ]);
        DB::table('videos')->where(['id'=>$id])->update([
            'title'=>$request->get('title'),
            'url'=>$request->get('url'),
            'updated_at'=>DB::raw('NOW()')
        ]);
        notify()->success("تم تعديل الفيديوا بنجاح");
        return redirect("admin/videos_table");
    }

    public function destroy($id){
        DB::table('videos')->delete($id);
        notify()->success("تم حذف الفيديوا بنجاح");
        return redirect("admin/videos_table");
    }
}
