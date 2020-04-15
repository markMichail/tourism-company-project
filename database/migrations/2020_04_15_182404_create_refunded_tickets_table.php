<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundedTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunded_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ticket_id')->unsigned();
            $table->date('refund_date');
            $table->timestamps();
            $table->foreign('ticket_id')->references('id')->on('tickets');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunded_tickets');
    }
}
