<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use app\User;

class adminController extends Controller
{
    public function getdata(){

        $getdata=DB::table('users')
            ->where('id',auth::user()->id)
            ->get();

        // $getdata=User::find(5)->staff;

        
        return response()->json(["admindata"=>$getdata]);


    }
}
