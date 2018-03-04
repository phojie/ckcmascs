<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\user;
use auth;
use DB;
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
        // $user=user::find($getid)->staff;
        $user=DB::table('staff')
            ->where('user_id',$getid)
            ->first();

        if($gettype==0){
            return view('adminfiles.superadmin');
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
    
                // if($gettype==1){
                    return view('instructorfiles.dashinstructor');
                    
                // }
            }

        }
        
       
       
        
    }
}
