<?php

namespace App\Models\CommercialDesign;

use Illuminate\Database\Eloquent\Model;
 

class CommercialDesign extends Model
{
    //
    protected $casts = [
        'price_with_cover' => 'decimal:2',
        'price_without_cover' => 'decimal:2'
    ];

    // public function toSearchableArray() {
    //     $record = $this->toArray();
    //     $record['price_with_cover'] = (float) $this->price_with_cover;
    //     $record['price_without_cover'] = (float) $this->price_without_cover;
    //     return $record;
    // }

    public function colors() {
        return $this->hasMany('App\Models\CommercialDesign\CommercialDesignColor');
    }

    public function labels() {
        return $this->hasMany('App\Models\CommercialDesign\CommercialDesignLabel');
    }

    public function labels_front() {
        return $this->hasMany('App\Models\CommercialDesign\CommercialDesignLabel')->where('backside', false);
    }

    public function labels_back() {
        return $this->hasMany('App\Models\CommercialDesign\CommercialDesignLabel')->where('backside', true);
    }

    public function item() {
        return $this->belongsTo('App\Models\Commercial\CommercialItem', 'commercial_item_id');
    }

    







    
}
