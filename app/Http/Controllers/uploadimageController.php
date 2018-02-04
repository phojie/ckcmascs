<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
class uploadimageController extends Controller
{
    public function updatedartmentlogo(Request $request)
    {   
        // dd($request->all());
        // echo $request->file('pic');
        $file = $request->file('pics');
        $filename = $file->getClientOriginalName();
   
        $path ='C:\Users\Develop_hereJie\eyes\htdocs\CKCMacs\public\departmentlogo';

        $file->move($path, $filename);
        // $user_id = Auth::user()->id;
        DB::table('departments')->where('id', 149)->update(['logo'=>$filename]);

        // return view('profile.profile');
        return back();
    }
       
}
