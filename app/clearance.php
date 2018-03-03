<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clearance extends Model
{
    protected $fillable=['idno','status','updated'];
    public $timestamps=true;
}
