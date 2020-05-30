<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    protected $table = "safe";
    
    public function receipts(){
        return $this->hasMany('App\Receipt','safe_id','safe_id');
    }
}
