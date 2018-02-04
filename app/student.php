<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=['idno','semester','mfullname','ffullname','sy','lastschool','yearlevel','ad','user','user_id','created','updated','profilepic','first','second','last','fullname','pad','had','dob','age','em','contactn','pob','department','sex'];
    public $timestamps=true ;

}
