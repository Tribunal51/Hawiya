<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    //
    protected $table = 'main_categories';

    protected $fillable = ['name'];

    public function categories() {
        return $this->hasMany('App\Category');
    }
}
