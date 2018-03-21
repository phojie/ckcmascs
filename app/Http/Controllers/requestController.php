<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use App\requestfrom;
class requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $getrequest=requestfrom::all();
        $getid=auth::user()->id;
       
        $getrequest=DB::table('requestfroms')
            ->where('toid',$getid)
            ->leftJoin('students', 'requestfroms.bid', '=', 'students.user_id')
            ->get();

        $getrest=DB::table('clearances')
            ->where('status','Onhold')
            ->leftJoin('students','clearances.idno','=','students.user_id')
            ->get();

         
        // $getdatafromid=DB::table('students')
        //     ->where('user_id','2')
        //     ->get();

        // return $getrequest->all();
        return response()->json([
            'rest'=>$getrest,
            'requestdata'=>$getrequest
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
        $getid=auth::user()->id;
        
        $countid=DB::table('requestfroms')
            ->where('bid',$getid)
            ->where('toid',$request->user_id)
            ->where('subject',$request->subject)
            ->count();

        $countiid=DB::table('signeds')
            ->where('byid',$getid)
            ->where('toid',$request->user_id)
            ->where('subject',$request->subject)
            ->count();
        if($countid>0 || $countiid>0){
            
        }
        else{
            DB::table('requestfroms')->insert([
                'bid'=>$getid,'toid'=>$request->user_id,'subject'=>$request->subject
            ]);
        }
       
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
        // $get=DB::table('requestfroms')
        //     ->where('id',$id)
        //     ->first();

        // \Log::info($id);

        // DB::table('signeds')
        //     ->where('byid', $get->bid)
        //     ->where('toid', $get->toid)
        //     ->update(['status' => 'Rejected']);


        $myid=auth::user()->id;
        \Log::info($id);
        DB::table('requestfroms')
            ->where('bid',$id)
            ->where('toid',$myid)
            ->delete();
    }
}
