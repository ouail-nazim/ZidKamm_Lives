<?php

namespace App\Http\Controllers;

use App\Live;
use App\Message;
use Illuminate\Http\Request;
use Config;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $num=count(Message::where('vue',false)->get());
        Config::set('message',$num);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard(){
        $lives=count(Live::all());
        return view('admin.dashboard')->with(['numLives'=>$lives]);
    }
    public function allLives(){
        $lives=Live::all();
        return view('admin.allLives')->with(['Lives'=>$lives]);
    }
    public function addLive(){
        return view('admin.addLive');
    }
    public function mesMessage(){
        $all=Message::all();
        $vu=Message::where('vue',true)->get();
        $nonvu=Message::where('vue',false)->get();
        return view('admin.messages2')->with(['all'=>$all,'nonvu'=>$nonvu,'vu'=>$vu]);
    }
    public function seeMessage(){
        $id=request('id');
        $msg=Message::findorfail($id);
        $msg->vue=true;
        $msg->update();
        return view('admin.seemesage')->with(['message'=>$msg]);
    }
    public function deleteMessage($id){
        $msg=Message::findorfail($id);
        $msg->delete();
        return redirect('mesMessage');
    }
//    public function sendemail($email,$name){
//
//        $to_name = $name;
//        $to_email = "wailnazim28@gmail.com";
//        $data = array("name"=>"ouail", "body"=> "test email");
//        Mail::send("mail", $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)
//                    ->subject('test mail');
//            $message->from("wailnazim28@gmail.com","Test Mail");});
//        dd('ok')
//    }
}
