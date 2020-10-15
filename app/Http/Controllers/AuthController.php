<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view("admin.template");
        }
        return view('auth.login');
    }

    public function register()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin');
        }
        $request->session()->flash("error","المعلومات غير صحيحة");
        return Redirect::to("login");
    }

    public function postRegister(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create();

        return Redirect::to("dashboard");
    }

    public function dashboard()
    {

        if(Auth::check()){
            $lastPost = Post::orderBy('id','desc')->first();
            $lastVideo = DB::table('videos')->orderBy('id','desc')->first();
            $lastContacts = DB::table('contacts')->orderBy('created_at','ASC')->limit(3)->get('*');
            return view('admin.index')->with([
                'lastPost'=>$lastPost,
                'lastVideo'=>$lastVideo,
                'lastContacts'=>$lastContacts
            ]);
        }
        return view("auth.login")->with("error","ليست لديك صلاحية الدخول!  المرجوا إدخال معلومات حسابك.");
    }

    public function create()
    {
       User::create([
            'name' =>'abida',
            'email' => 'hamza@gmail.com',
            'password' => Hash::make('hamza2020')
        ]);
        return view("auth.login");
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
