<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\log;
use DB;
use App\user;
use auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $getdata=Staff::all();
        $geten=DB::table('staff')
            ->where('ad',0)
            ->count();
        // \Log::info($geten);
        $getdi=DB::table('staff')
        ->where('ad',1)
        ->count();

        $gid=auth::user()->id;

        $gestaff=DB::table('staff')
            ->where('user_id',$gid)
            ->get();

        $getdata=Staff::orderBy('id', 'DESC')->get();
        return response()->json([
            "staffdata"=>$gestaff,
            "datastaffs"=>$getdata,
            "enabled"=>$geten,
            "disabled"=>$getdi]);

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
        if ($request->gender=="Male"){
            $profilepic="nobody_m.128x128.jpg";
        }
        else{
            $profilepic="nobody_f.128x128.jpg";
        }
              
        $datenw = date("F j, Y");
        
        $getdp=DB::table('departments')
            ->where('name',$request->department)
            ->first();
        $existni=$getdp->total;
        $overall=$existni+ "1";
        // \Log::info($getdp->total);
        
        DB::table('departments')
            ->where('name',$request->department)
            ->update(['total' => $overall]);

        log::create([
            'act'=>'You',
            'activity'=>'Added',
            'message'=> $request->first." ".$request->second." ".$request->last." as a staff",
            'created'=>$datenw,
            'updated'=>$datenw
        ]);

        User::create([
            'name' => $request->first,
            'email' => $request->em,
            'password' => bcrypt('ckcm'.$request->first),
            'type'=> '1'
            
        ]);

        $gettheid=DB::table('users')
            ->where('name',$request->first)
            ->first();
        \Log::info($gettheid->name);

        Staff::create($request->except('fullname') + [
            'user_id' => $gettheid->id,
            'fullname' => $request->first." ".$request->second." ".$request->last,
            'profilepic'=> $profilepic,
            'created'=> $datenw,
            'updated'=> $datenw,
            'user'=> $gettheid->name,

        ]);
        
        return response()->json([
            'updatenow'=>'updated'
            
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
        if ($request->gender=="Male"){
            $profilepic="nobody_m.128x128.jpg";
        }
        else{
            $profilepic="nobody_f.128x128.jpg";
        }
        $get= Staff::find($id);
        $get->update($request->except('fullname','profilepic') + [
            'fullname' => $request->first." ".$request->second." ".$request->last,
            'profilepic' => $profilepic,
        ]);
        return response()->json([
            'updatenow'=>'updated'
            
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
        $getdelete= Staff::find($id);
        // \Log::info($getdelete->department);
        $getdp=DB::table('departments')
            ->where('name',$getdelete->department)
            ->first();

        $existni=$getdp->total;
        $overall=$existni - "1";
        // \Log::info($getdp->total);
        
        $get=DB::table('staff')
            ->where('id',$id)
            ->first();
        
        User::destroy($get->user_id); 
        Staff::destroy($id);

        \Log::info($get->user_id);

        DB::table('departments')
            ->where('name',$getdelete->department)
            ->update(['total' => $overall]);

        return response()->json([
            'updatenow'=>'updated'
            
        ]);

     
    }
}
