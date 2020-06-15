<?php

namespace App\Http\Controllers;

use App\Live;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function index() {
       //dd(App::getLocale(),$local);

        if (request('lang')!=null){
            $lang=request('lang');
            App::setLocale($lang);
        }

            $lives=Live::all();
            return view('user.index')->with(['Lives'=>$lives]);



    }
    function sherchUser (Request $request){
        $lives=Live::where('title','like','%'.request('search').'%')
            ->orWhere('name','like','%'.request('search').'%')
            ->get();
        return view('user.index')->with(['Lives'=>$lives]);
    }
    function about () {
        return view('user.about');
    }
    function contact () {
        return view('user.contact');
    }
    function contactUS(Request $request){
        $request->validate([
            'firstName' => ['required','max:20','regex:/^[a-zA-ZÀ-ž_\s]*$/'],
            'lastName' => ['required','max:20','regex:/^[a-zA-ZÀ-ž_\s]*$/'],
            'email' => 'required|email',
            'message'=>'required'
        ]);
        $firstNAme=request('firstName');
        $lastName=request('lastName');
        $email=request('email');
        $message=request('message');

        $send=new Message();
        $send->firstName=$firstNAme;
        $send->lastNAme=$lastName;
        $send->email=$email;
        $send->message=$message;
        $send->save();
        echo '<script>alert("The message well received");</script>';
        return view('user.contact');

    }
//    function send(){
//        $to_name = "ouail nazim";
//        $to_email = "manarhasna2004@gmail.com";
//        $data = array("name"=>"mehamed", "body" => "A_test_mail_of_my_email");
//        Mail::send("user.mail", $data, function($message) use ($to_name, $to_email) {
//        $message->to($to_email, $to_name)->subject("Laravel_Test_Mail");
//        $message->from("SENDER_EMAIL_ADDRESS");
//        });
//    }
}
