<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\customers as Authenticatable;

class customers extends Authenticatable
{
    //
    protected  $guared = [];

    protected $fillable = [
        'username', 'name', 'password',
    ];
    public $timestamps = false;

}
