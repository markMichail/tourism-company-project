<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
   
    public function tickets(){
        return $this->BelongsToMany('App\Ticket')->withPivot('amount');;
    }

    public function receiptable(){
        return $this->morphTo();
    }

    public function safe(){
        return $this->belongsTo('App\Safe','safe_id','safe_id');
    }
}
