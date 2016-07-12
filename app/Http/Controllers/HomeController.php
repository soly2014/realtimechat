<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Messages;
use Auth;
use Session;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       

        return view('welcome');
    }


    // 

    public function chatBox($id)
    {
        

        Session::push('active.Chat', $id);
       
       
        $mes = \App\Messages::where(function ($query) use ($id){
                            $query->where('to',Auth::user()->id)
                                  ->where('from',$id);
                            })->orWhere(function  ($query)use ($id) {
                            $query->where('from',Auth::user()->id)
                                  ->where('to',$id);
                            })->get()->toArray();  


        $data = view('chatbox')->with('url',$id)
                               ->with('msg',$mes)
                               ->render();

         if(!empty($data))
                {
                return response()->json($data);
                }else{
                return response()->json('false');
                }


    }


    public function chat()
    {
      
       $session = array_unique(Session::get('active.Chat'));

       foreach ($session as $id) {

        $mes = \App\Messages::where(function ($query) use ($id){
                            $query->where('to',Auth::user()->id)
                                  ->where('from',$id);
                            })->orWhere(function  ($query)use ($id) {
                            $query->where('from',Auth::user()->id)
                                  ->where('to',$id);
                            })->get()->toArray();  
       }


       return view('home',['session'=>$session,'msg'=>$mes]);
    }



    
}
