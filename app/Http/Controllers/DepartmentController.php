<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\log;
use DB;
use App\User;
use auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data=DB::table('departments')
            // ->get();
        $data=Department::orderby('id','DESC')->get();
        $datacount=Department::orderby('id','DESC')->count();
        
        return response()->json([
            "datadepartments2"=>$data,
            "countde"=>$datacount
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

        $datenw = date("F j, Y");

        // \Log::info($request->all());

        $exploded = explode(',',$request->logo);
        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg'))
            $extension='jpg';
        
        else
            $extension='png';

        $fileName = str_random().'.'.$extension;

        $path = public_path('departmentlogo').'/'.$fileName;

        file_put_contents($path, $decoded);
        $logonku= $fileName;
        
        log::create([
            'act'=>'You',
            'activity'=>'Added',
            'message'=>$request->name,
            'created'=>$datenw,
            'updated'=>$datenw

        ]); 
        Department::create($request->except('logo') + [
            // 'user_id'=>auth::id(),
            'logo' => $fileName,
            'created'=> $datenw,
            'updated'=> $datenw,
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
        $datenw = date("F j, Y");

        // $getlogo=DB::table('departments')
        //     ->where('id',$id)
        //     ->first();
        // \Log::info($id ." ". $request->logo. " " . $getlogo->logo);
        \Log::info($request->logo);    
        if ($request->logo == ""){
            $get= Department::find($id);
            $get->update($request->except('logo') + [
                'updated'=> $datenw
                
            ]);
           
        }
        else{
           
      
            $exploded = explode(',',$request->logo);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
                $extension='jpg';
            
            else
                $extension='png';

            $fileName = str_random().'.'.$extension;

            $path = public_path('departmentlogo').'/'.$fileName;

            file_put_contents($path, $decoded);
            $logonku= $fileName;

            $get= Department::find($id);
            $get->update($request->except('logo') + [
                'logo'=> $fileName
                
            ]);
           
        }
       

        log::create([
            'act'=>'You',
            'activity'=>'Updated',
            'message'=>$request->name." Department",
            'created'=>$datenw,
            'updated'=>$datenw

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
        $getdp=DB::table('departments')
            ->where('id',$id)
            ->first();

        //staff & users
        $jie=DB::table('users')
            ->leftJoin('staff','users.id','=','staff.user_id')
            ->where('staff.department','=',$getdp->name)
            ->delete();

        DB::table('staff')
            ->where('department','=',$getdp->name)
            ->delete();
           
        //end


        //students & users
        DB::table('users')
            ->leftJoin('students','users.id','=','students.user_id')
            ->where('students.department','=',$getdp->name)
            ->delete();
        
        DB::table('students')
            ->where('department',$getdp->name)
            ->delete();


        //end


        DB::table('departments')
        ->where('id',$id)
        ->delete();

        return response()->json([
            'updatenow'=>'updated'
            
        ]);
       
    }
}
