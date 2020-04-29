<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  
    protected $fillable=['customer_id','employee_id','status','date'];
    public function tickets(){
      return $this->hasMany('App\Ticket');
  }


  public function customer(){
    return  $this->belongsTo('App\Customer');
  }

  public function ticketsAmount(){
    $data=[];
    $tickets = Ticket::with('receipts')->where('order_id',$this->id)->get();
    $ordertotal=0;
    $payed=0;
    foreach ($tickets as $ticket) {
      $receipts=$ticket->receipts;
      $ordertotal+=$ticket->sellprice;
      if($receipts->count()>0){
        $total=0;
        foreach ($receipts as $receipt) {
          $total+=$receipt->pivot->amount;
          $payed+=$receipt->pivot->amount;
        }   
        array_push($data,[$ticket,$total]);
      } else {array_push($data,[$ticket,0]);} 
    }
    return [$data,$ordertotal,$payed];
  }

}
