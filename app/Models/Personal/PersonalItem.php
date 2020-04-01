<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Model;

class PersonalItem extends Model
{
    //
    protected $fillable = [
        'name', 
        'image'
    ];

    public function subitems() {
        return $this->hasMany('App\Models\Personal\PersonalSubItem');
    }
}
