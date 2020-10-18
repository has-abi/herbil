<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function posts(){
        $posts = Post::orderBy('created_at','asc')->paginate(10);
        return view("admin.posts_table")->with("posts",$posts);
   }
   public function changeStatus($id){
       $post = DB::table('posts')->find($id);
       if($post->status){
           DB::table('posts')->where(['id'=>$id])->update([
               'status'=>false
           ]);

       }else{
           DB::table('posts')->where(['id'=>$id])->update([
               'status'=>true
           ]);
       }
       notify()->success('تم تغيير حالة المنشور بنجاح');
   }
}
