<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
class studentsSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getid=auth::user()->id;
        $data=DB::table('studentssubs')
                ->where('instructor',$getid)
                ->get();

        $count=DB::table('studentssubs')
            ->where('instructor',$getid)
            ->count();

        return response()->json([
            'data'=>$data,
            'count'=>$count
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
        DB::table('studentssubs')->insert([
            'instructor'=>$request->instructor,
            'student'=>$request->stid,
            'subjectcode'=>$request->subid
        ]);

        return response()->json([
            'alert'=>$request->instructor
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
        DB::table('studentssubs')
            ->where('id',$id)
            ->delete();
    }
}
