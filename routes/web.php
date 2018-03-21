<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/test', function() {
    return view('testing');
});




// admin routes ni tanan naa dre
// |
// |

Route::group(['middleware'=>'auth'],function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('departmentdata','DepartmentController');
    Route::resource('staffdata', 'StaffController');
    Route::resource('activitylog', 'logController');
    Route::resource('instructor', 'instructorController');
    Route::resource('registrardata', 'registrarController');
    Route::resource('studentsdata', 'studentsController');
    Route::resource('requirementdata', 'requirementsController');
    Route::resource('requestdata', 'requestController');
    Route::resource('signdata', 'signController');
    Route::resource('rejectdata', 'rejectController');
    Route::resource('subjectdata', 'subjectController');
    Route::resource('officedata', 'officeController');
    Route::resource('studentsSubdata', 'studentsSubController');
    
    Route::post('/act','adminController@act');
    Route::post('/updatedartmentlogo', 'uploadimageController@updatedartmentlogo');
    Route::get('/admindata','adminController@getdata');

    //dummy for vue ni
    Route::post('/studentsdata','studentsController@store');
    Route::post('/departmentdata','DepartmentController@store');
    Route::post('/staffdata','StaffController@store');
    

    //login
    
   
});

// |
// |

// exitdre