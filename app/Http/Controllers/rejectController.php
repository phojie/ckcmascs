<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use signed;
class rejectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getid=auth::user()->id;
       
        $getrequest=DB::table('signeds')
            ->where('toid',$getid)
            ->where('status','Rejected')
            ->leftJoin('students', 'signeds.byid', '=', 'students.user_id')
            ->get();


         
        // $getdatafromid=DB::table('students')
        //     ->where('user_id','2')
        //     ->get();

        // return $getrequest->all();
        return response()->json([
            'requestreject'=>$getrequest
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
        DB::table('signeds')
        ->where('byid', $request->byid)
        ->where('toid', $request->toid)
        ->update(['status' => 'Signed']);
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
