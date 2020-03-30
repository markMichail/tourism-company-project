<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_receipt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ticketId')->unsigned()->nullable();
            $table->bigInteger('receiptId')->unsigned()->nullable();
            $table->float('amount');
            $table->timestamps();

            $table->foreign('ticketId')->references('id')->on('tickets');
            $table->foreign('receiptId')->references('id')->on('receipts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_receipt');
    }
}
