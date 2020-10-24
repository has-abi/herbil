<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use \App\Http\Controllers\VideoController;
use \App\Http\Controllers\ContactController;
use App\Http\Controllers\CategorieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('categorie',[PostController::class,'byCategorie']);
Route::get('search',function (){
    return view('search');
});
Route::get('chercher',[PostController::class,'chercher'])->name('search');
Route::get('/',[PostController::class,'index'])->name('/');

Route::get("posts",[PostController::class,'index'])->name('posts');

Route::get("posts/create",[PostController::class,'create'])->name("posts.create");


Route::post('post_statu/{id}',[AdminController::class,'changeStatus']);
Route::post("post_create",[PostController::class,'store'])->name('post_create');
Route::post("upload",[PostController::class,'upload'])->name("upload");

Route::get("post/edit/{id}",[PostController::class,'edit'])->name('post_edit');
Route::post("post_update",[PostController::class,'update'])->name('post_update');
Route::delete("post_delete/{id}",[PostController::class,'destroy'])->name('post_destroy');
Route::get("admin/posts_table",[AdminController::class,'posts'])->name('posts');
Route::get('post/{id}',[PostController::class,'show'])->name('post');

//admin routes
Route::get('login', [AuthController::class,'index'])->name("login");
Route::get('profile',[AuthController::class,'edit']);
Route::post('user_update',[AuthController::class,'update']);
Route::post('login',[AuthController::class,'login'])->name('_login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('post-register', [AuthController::class,'postRegister']);
Route::get('admin',[AuthController::class,'dashboard'])->name("admin");
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::get('create',[AuthController::class,'create'])->name('create');

//video routes
Route::get('video/add',[VideoController::class,'create']);
Route::post('video_post',[VideoController::class,'store']);
Route::get('admin/videos_table',[VideoController::class,'index'])->name("videos");
Route::delete("video_delete/{id}",[VideoController::class,'destroy']);
Route::get("video/edit/{id}",[VideoController::class,'edit']);
Route::post("post_update/{id}",[VideoController::class,'update']);

//post routes
Route::get('contact',function (){
   return view("contact");
})->name('contact');
Route::get('mail',function (){
    return view('mail.reply_mail');
});
Route::post("contact",[ContactController::class,'store']);
Route::get("contact/all",[ContactController::class,'index']);
Route::delete("contact_delete/{id}",[ContactController::class,'destroy']);
Route::get("contact/respond/{id}",[ContactController::class,'respond']);
Route::post("send",[ContactController::class,'send'])->name('send');

Route::get('/news',[PostController::class,'getAll'])->name('news');
Route::get('ville',function (){
    return view('ville');
})->name('ville');

//cat routes
Route::post('cat/store',[CategorieController::class,'store']);
Route::post('cat/update/{id}',[CategorieController::class,'update']);
Route::get('cat/edit/{id}',[CategorieController::class,'edit']);
Route::get("cat/create",function (){
    return view('categorie.create');
});

Route::get('specialite',function (){
    return view('specialite');
})->name('specialite');

Route::get('image/{postId}',[PostController::class,'getThumbnail']);
Route::get('album/image/{id}',[PostController::class,'getAlbumImage']);
Route::get('attachement/{id}',[PostController::class,'getAttachement']);

Route::get('responses',[ContactController::class,'responses']);
Route::get('response/{id}',[ContactController::class,'respond']);
Route::get('att/{id}',[ContactController::class,'getResponseAtt']);
Route::delete('res_delete/{id}',[ContactController::class,'deleteRes']);

