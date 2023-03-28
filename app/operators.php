<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\operators;
use Illuminate\Foundation\Auth\operators as Authenticatable;
class operators extends Authenticatable
{
    protected  $guared = [];

    protected $fillable = [
        'username', 'name', 'password',
    ];

    public $timestamps = false;

}
