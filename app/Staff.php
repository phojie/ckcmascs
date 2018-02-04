<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=['ad','user','user_id','created','updated','profilepic','first','second','last','fullname','address','dob','age','em','contactn','pob','jobtitle','department','gender'];
    public $timestamps=true ;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
