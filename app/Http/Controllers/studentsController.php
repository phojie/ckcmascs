<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\user;
use DB;
use Auth;
use App\department;
class studentsController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $st=student::all();
        return response()->json(["studentlists"=>$st]);

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
        // $jie=student::create($request->all());
        // \Log::info($jie);
        // \Log::info($request->lastschool);

        if ($request->sex=="Male"){
            $profilepic="nobody_m.128x128.jpg";
        }
        else{
            $profilepic="nobody_f.128x128.jpg";
        }
              
        $datenw = date("F j, Y");
        
        $this->validate($request,[
            'em'=> 'required|email|'
        ]);

        User::create([
            'name' => $request->first,
            'email' => $request->em,
            'password' => bcrypt('ckcm'.$request->first),
            'type'=> '2'
            
        ]);



        $gettheid=DB::table('users')
        ->where('email',$request->em)
        ->first();

        student::create($request->except('fullname') + [
            'user_id' => $gettheid->id,
            'fullname' => $request->first." ".$request->second." ".$request->last,
            'profilepic'=> $profilepic,
            'created'=> $datenw,
            'updated'=> $datenw,

        ]);
        
        $getstotal=DB::table('departments')
            ->where('name',$request->department)
            ->first();
        
        
        $ostotal=$getstotal->stotal + "1";

        DB::table('departments')
            ->where('name',$request->department)
            ->update(['stotal'=>$ostotal]);
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
        
        $get=DB::table('students')
            ->where('user_id',$id)
            ->first();
        
        $getstotal=DB::table('departments')
            ->where('name',$get->department)
            ->first();

        // \Log::info($getstotal->stotal);
        
        $ostotal=$getstotal->stotal - "1";
        // \Log::info($ostotal);

        // \Log::info($ostotal);
        DB::table('departments')
            ->where('name',$get->department)
            ->update(['stotal'=>$ostotal]);
        
        User::destroy($id); 
    
        DB::table('students')
            ->Where('user_id',$id)
            ->delete();
          
       
    }
}
