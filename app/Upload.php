<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = ['upload_id', 'filename'];

    public function profile() {
        return $this->belongsTo('App\Profile');
    }
}
