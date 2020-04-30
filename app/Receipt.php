<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Destination;
class Receipt extends Model
{
    protected  $guarded=[];
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
