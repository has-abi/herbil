<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminController extends Controller
{
   public function posts(){
        $posts = Post::orderBy('created_at','asc')->paginate(10);
        return view("admin.posts_table")->with("posts",$posts);
   }
}
