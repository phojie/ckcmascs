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
        $user=DB::table('staff')
            ->where('user_id',$getid)
            ->first();

        if($gettype == 0){
            return view('adminfiles.superadmin');
        }
        elseif($gettype == -1 || $gettype == 3){
            return view('registrarfiles.dashregistrar');
        }
        elseif($gettype == 2 ){
            return view('instructorfiles.dashstudents');
        }
        elseif($gettype == 1)
        {
            if($user->ad==1){
                return "your account was disable";
            }
            elseif($user->ad==0){
    
                // if($gettype==1){
                    return view('instructorfiles.dashinstructor');
                    
                // }
            }
            else{
                return "lol";
            }
            

        }
        else{
            return "lol";
        }
        
            // return view('instructorfiles.dashstudents');
        
    }
}
