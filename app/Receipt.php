<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
   
    public function tickets(){
        return $this->BelongsToMany('App\Ticket')->withPivot('amount');;
    }
}
