<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use signed;

class signController extends Controller
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
            ->where('status','Signed')
            ->leftJoin('students', 'signeds.byid', '=', 'students.user_id')
            ->get();

        $getcount=DB::table('signeds')
            ->where('toid',$getid)
            ->where('status','Signed')
            ->leftJoin('students', 'signeds.byid', '=', 'students.user_id')
            ->count();
         
        $getcountt=DB::table('students')
            ->count();
        // $getdatafromid=DB::table('students')
        //     ->where('user_id','2')
        //     ->get();

        // return $getrequest->all();
        return response()->json([
            'requestsucc'=>$getrequest,
            'count'=>$getcount,
            'countt'=>$getcountt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datenw = date("F j, Y");

        $myid=auth::user()->id;
        \Log::info('ds');
        DB::table('signeds')->insert([
            'byid'=> $request->bid,
            'toid'=> $myid,
            'subject'=>$request->subject,
            'status' => 'Signed',
            'updated'=>$datenw
        ]);

        DB::table('requestfroms')
            ->where('bid',$request->bid)
            ->where('toid',$myid)
            ->where('subject',$request->subject)
            ->delete();

            \Log::info('sfdf');
        return response()->json([
            'alert'=>'alert'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\<Response></Response>
     */
    public function update(Request $request, $id)
    {
        DB::table('signeds')
            ->where('byid', $request->byid)
            ->where('toid', $request->toid)
            ->where('subject', $request->subject)
            ->update(['status' => 'Rejected']);
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
