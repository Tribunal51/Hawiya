<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';

    protected $fillable = [
        'name', 
        'token_prefix',
        'main_category_id'
    ];

    public function main_category() {
        return $this->belongsTo('App\MainCategory');
    }
}
