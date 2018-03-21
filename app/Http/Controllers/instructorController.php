<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\user;
use app\staff;
use auth;
use DB;
class instructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth::user()->id;
        // $useracc=DB::table("users")
        //     ->where('id',$user)
        //     ->get();

        // $userdata=DB::table("staff")
        //     ->where('user_id',$user)
        //     ->get();
        
        $getsub=DB::table('studentssubs')
            ->where('student',$user)
            ->get();

        // $getins=DB::table('')
        $getsts=DB::table('signeds')
            ->where('byid',$user)
            ->get();

        $getins=DB::table('studentssubs')
            ->leftJoin('staff','studentssubs.instructor','staff.user_id')
            ->where('student',$user)
            ->leftJoin('signeds','studentssubs.instructor','signeds.toid')
            ->leftJoin('subjects','studentssubs.subjectcode','subjects.id')
            // ->where('')
            ->get();

        $ge=DB::table('signeds')
            ->where('byid',$user)
            // ->leftJoin('students','signeds.byid','students.user_id')
            ->leftJoin('staff','signeds.toid','staff.user_id')
            ->get();
      
        $userdata=DB::table("staff")
            ->where('user_id',$user)
            ->leftJoin('users','users.id','=','user_id')
            ->get();


        // return $userdata;
        return response()->json([
            'instructordata'=>$userdata,
            'subdata'=>$getsub,
            'getins'=>$getins,
            'ge'=>$ge
            // 'accdata'=>$useracc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
