<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Model;

class PersonalSubitem extends Model
{
    //

    public function item() {
        return $this->belongsTo('App\Models\Personal\PersonalItem', 'personal_item_id');
    }
}
