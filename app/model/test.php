<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $casts = [
        'name' => 'array'
    ];


    protected $table = 'tests';

    protected $fillable = [
        'age',
        'price',

    ];

    //
}
