<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requirement extends Model
{
    protected $fillable=['byid','name','description','updated'];
    public $timestamps=true;
}
