<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogodesignOrder extends Model
{
    //
    protected $casts = [
        'style' => 'array',
        'price' => 'decimal:2'
    ];

    protected $fillable = ['user_id','package'];

    public function getNextId() {
        $statement = DB::select("show table status like 'logodesign_orders'");
        return $statement[0]->Auto_increment;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function address() {
        return $this->belongsTo('App\Models\User\Address');
    }
    
    

}   
