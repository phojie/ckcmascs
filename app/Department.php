<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['stotal','name','adean','dean','description','logo','total','created','updated'];
    public $timestamps=true;
}
