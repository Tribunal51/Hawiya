<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogodesignOrder extends Model
{
    //

    protected $casts = [
        'style' => 'array'
    ];

    protected $fillable = ['user_id','package'];
}
