<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
  protected $fillable=['name','phone'];

  public function receipts(){
    return $this->morphMany('App\Receipt','receiptable');
}
}
