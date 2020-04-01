<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'title',
        'zipcode',
        'block',
        'street',
        'avenue',
        'house',
        'building',
        'floor',
        'apartment',
        'phone',
        'notes',
        'city',
        'country'
    ];
}
