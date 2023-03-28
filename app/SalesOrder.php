<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    //
    protected $table = 'sale_order';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
