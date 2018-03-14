<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use app\User;

class adminController extends Controller
{
    public function getdata(){

        $getstaff=DB::table('staff')
            ->count();

        $getoffices=DB::table('offices')
            ->count();

        $getdata=DB::table('users')
            ->where('id',auth::user()->id)
            ->get();

        // $getdata=User::find(5)->staff;

        
        return response()->json([
            "admindata"=>$getdata,
            "staffcount"=>$getstaff,
            "countoff"=>$getoffices
            
        ]);


    }

    public function act(){
        $get=DB::table('finance_as')
            ->where('id','1')
            ->first();

        if($get->activation==0){
            DB::table('finance_as')
            ->where('id','1')
            ->update([
                'activation'=>'1'
            ]);
        }
        else{
            DB::table('finance_as')
            ->where('id','1')
            ->update([
                'activation'=>'0'
            ]);
        }
    }
}
