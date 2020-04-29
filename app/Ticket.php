<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    protected $guarded=['id'];

    public function receipts(){
        return $this->BelongsToMany('App\Receipt')->withPivot('amount');;
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function calculate(){
       $receipts= $this->receipts;
       $sellprice=$this->sellprice;
       $payed=0;
       if($receipts->count()>0){
       foreach ($receipts as $receipt) {
          $payed+=$receipt->pivot->amount;
       }
    }
       if ($sellprice==$payed){
           return 'alerady payed';
       }
       else {
           return $sellprice-$payed;
       }
    }
}
