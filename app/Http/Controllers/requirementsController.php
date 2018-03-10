<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use App\requirement;
class requirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=auth::user()->id;        
        $allclearance=DB::table('requirements')
            ->get();
        $clearance=DB::table('requirements')
            ->where('byid',$userid)
            ->get();

        return response()->json([
            'rlists'=>$clearance,
            'all'=>$allclearance
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

        $gettheid=auth::user()->id;        
        DB::table('requirements')->insert([
            'byid'=> $gettheid, 
            'name'=> $request->name,
            'description'=> $request->description,
            'updated'=>$datenw
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
        requirement::destroy($id);

    }
}
