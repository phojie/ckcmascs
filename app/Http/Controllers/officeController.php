<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\office;
use App\user;
use Auth;
use DB;
class officeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myid=auth::user()->id;
        $getdata=DB::table('offices')
            ->where('user_id',$myid)
            ->first();

        $getstatus=DB::table('signeds')
            ->where('toid',$myid)
            ->get();
        
        $get=DB::table('offices')
            ->leftJoin('signeds','offices.user_id','signeds.toid')
            // ->where('byid','!=',$myid)
            ->get();        

        return response()->json([
            'officedata'=>$get,
            'profof'=> $getdata,
            'getstatus'=>$getstatus
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
        
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('ckcmoffice'),
                'type'=> '3'
                
            ]);
        
        $getid=DB::table('users')
            ->where('email',$request->email)
            ->first();

        DB::table('offices')->insert([
            'user_id'=> $getid->id,
            'name'=> $request->name,
            'assign' => $request->assign,
            'email'=> $request->email,
            'location'=> $request->location
            
        ]);
        
        return response()->json([
            'updatenow'=>'update'
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
        $getid=DB::table('offices')
            ->where('email',$request->email)
            ->first();

        DB::table('users')
            ->where('id',$getid->user_id)
            ->update([
                'name' => $request->assign,
                'email' => $request->email,
            ]);

        DB::table('offices')
            ->where('email', $request->email)
            ->update([
                'name' => $request->name,
                'assign' => $request->assign,
                'email' => $request->email,
                'location' => $request->location
            ]);
        
       
        return response()->json([
            'updatenow'=>'update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getid=DB::table('offices')
            ->where('id',$id)
            ->first();

        user::destroy($getid->user_id);
        office::destroy($id);
        return response()->json([
            'updatenow'=>'update'
        ]);
    }
}
