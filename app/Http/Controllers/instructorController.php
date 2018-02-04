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


        $userdata=DB::table("staff")
            ->where('user_id',$user)
            ->leftJoin('users','users.id','=','user_id')
            ->get();


        // return $userdata;
        return response()->json([
            'instructordata'=>$userdata,
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
