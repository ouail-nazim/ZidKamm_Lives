<?php

namespace App\Http\Controllers;

use App\Live;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $num=count(Message::where('vue',false)->get());
        Config::set('message',$num);
    }

    public function saveLive(Request $request){
//        dd($request);
        $this->validate($request,[
            'img'=>'image|required|mimes:png,jpg,jpeg,gif',
            'title'=>'required',
            'link'=>'required',
            'name'=>'required',
            'annee'=>'required|date'
        ]);
        $live=new Live();
        $live->title=request('title');
        $live->link=request('link');
        $live->name=request('name');
        $live->annee=request('annee');
        if ($request ->hasFile('img')){

            $image=$request->file('img');
            $extention=$image->getClientOriginalExtension();
            $image_name=time().'.'.$extention;
            $image->move('storage/images/',$image_name);
            $live->img=$image_name;

        }else{
            dd(false);
            return $request;
            $live->img='';
        }

        $live->save();
        return redirect(route('home'));

    }
    public function deletLive($id){
        $live=Live::findorfail($id);
        $live->delete();
        return redirect(route('home'));
    }
    public function sherch(Request $request){
        $this->validate($request,[
            'search'=>'required|max:40'
        ]);

        $lives=Live::where('title','like','%'.request('search').'%')
            ->orWhere('name','like','%'.request('search').'%')
            ->get();
        return view('admin.allLives')->with(['Lives'=>$lives]);
    }
}
