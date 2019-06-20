<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['title', 'category', 'details'];
    public function uploads() {
        return $this->hasMany('App\Upload', 'upload_id');
    }
}
