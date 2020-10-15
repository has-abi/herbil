<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        if(Auth::check()){
            $contacts = DB::table('contacts')->orderBy('created_at','asc')->paginate(6) ;
            return view("admin.contact_tables")->with("contacts",$contacts);
        }
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'name'=>'required',
            'phone'=>'required',
            'content'=>'required',
            'subject'=>'required'
        ]);
        $contact = new Contact;
        $contact->name = $request->get("name");
        $contact->email = $request->get("email");
        $contact->phone = $request->get("phone");
        $contact->content = $request->get("content");
        $contact->subject = $request->get("subject");
        if($contact->save()){
            $request->session()->flash("success","تم تسجيل رسالتك بنجاح");
        }
        else{
            $request->session()->flash("error   ","لم نستطع تسجيل رسالتك، المرجوا المحاولة من جديد!");
        }
        return view("contact");
    }

    public function respond($id){
        if(Auth::check()){
            $contact = DB::table('contacts')->find($id);
            return view("admin.contact_respond")->with("contact",$contact);
        }
    }
    public function send(Request $request){
        $request->validate([
            'content'=>'required'
        ]);
        $content = $request->get('content');
        $email = $request->get('email');
        Mail::to($email)->send(new ReplyMail($content));
        notify()->success("تم إرسال الجواب بنجاح");
        return redirect("contact/all");
    }
    public function destroy($id){
        DB::table('contacts')->delete($id);
        notify()->success("تم حذف الرسالة بنجاح");
        return redirect("contact/all");
    }
}
