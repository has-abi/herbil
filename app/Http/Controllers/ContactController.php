<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Models\Contact;
use App\Models\Respond;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function responses(){
        $responses = Respond::with('contact')->orderBy('id','DESC')->paginate(10);
        return view("admin.responses_table")->with('responses',$responses);
    }

    public function getResponseAtt($respond_id){
        $this->getFile($respond_id,'attachements');
    }
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
        $respond = new Respond;
        $content = $request->get('content');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $contact_id = $request->get('contact_id');


        $respond->content = $content;
        $respond->contact_id = $contact_id;

        $respond->save();
        $att = url('att/'.$respond->id);
        Mail::to($email)->send(new ReplyMail($content,$subject,$att,$request->file('att')->getClientOriginalName()));
        if($request->hasFile('att')){
            $file = $request->file('att');
            $this->insertFile($respond->id,$file,"attachements");
        }

        DB::table('contacts')->where(['id'=>$request->get('contact_id')])->update([
            'respond'=>true
        ]);
        notify()->success("تم إرسال الجواب بنجاح");
        return redirect("contact/all");
    }
    public function destroy($id){
        DB::table('contacts')->delete($id);
        notify()->success("تم حذف الرسالة بنجاح");
        return redirect("contact/all");
    }


    public function insertFile($respond_id,$file,$table){

        $sql = "INSERT INTO ".$table."(size,extension,name,respond_id,file,mime) "
            . "VALUES(:size,:extension,:name,:respond_id,:file,:mime)";
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
                ':respond_id' => $respond_id,
                ':mime'=>$file->getClientMimeType(),
                ':file'=>$fileData
            ]);

            // commit the transactions
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    public function getFile($id,$table){
        $pdo = DB::connection()->getPdo();
        $pdo->beginTransaction();

                   $stmt = $pdo->prepare("SELECT id, file, extension,mime,name "
                . "FROM ".$table
                . " WHERE respond_id = :id");

        // query blob from the database
        $stmt->execute([$id]);
        $fileData = "";
        $ext = "";
        $mime = "";
        $name = "";
        $stmt->bindColumn('file', $fileData, $pdo::PARAM_STR);
        $stmt->bindColumn('extension', $ext, $pdo::PARAM_STR);
        $stmt->bindColumn('mime', $mime, $pdo::PARAM_STR);
        $stmt->bindColumn('name', $name, $pdo::PARAM_STR);
        $stmt->fetch(\PDO::FETCH_BOUND);
        $stream = $pdo->pgsqlLOBOpen($fileData, 'r');

        // output the file
        header("Content-type: ".$mime);
        header("Content-disposition: attachment; filename=\"$name\"");
        fpassthru($stream);
    }
    public function createFileName($file){
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        return $fileName;
    }

    public function deleteRes($id){
            DB::table('responds')->delete($id);
            return redirect('responces');
    }
}
