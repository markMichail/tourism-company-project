<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{


    public function receipts(){
        return $this->BelongsToMany('App\Receipt')->withPivot('amount');;
    }
}
