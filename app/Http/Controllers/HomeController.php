<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\user;
use auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gettype=auth::user()->type;
        $getid=auth::user()->id;
        $user=USER::find($getid)->staff;

        if($gettype==0){
            return view('adminfiles.dashadmin');
        }
        elseif($gettype== -1){
            return view('registrarfiles.dashregistrar');
        }
        else{
            
            if($user->ad==1){
                return "your account was disable";
                // return view('adminfiles.dashadmin');
                
            }
            elseif($user->ad==0){
    
                if($gettype==1){
                    return view('instructorfiles.dashinstructor');
                    
                }
            }

        }
        
       
       
        
    }
}
