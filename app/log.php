<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected $fillable=['act','activity','message','created','updated'];
    public $timestamps=true;
}
