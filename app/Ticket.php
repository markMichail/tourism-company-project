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
       $status="in progress";
       $payed=0;
       if ($this->type=="refunded"){
           $status="ticket already refunded";
       }
       if($receipts->count()>0){
       foreach ($receipts as $receipt) {
           if($receipt->type=="revenue")
          $payed+=$receipt->pivot->amount;
       }
    }
       if ($sellprice==$payed){
           $status = 'already payed';
       }
       
           return [ "status"=>$status  , "payed"=>$payed ,"left" => $sellprice-$payed];
       
    }
}
