<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ticketNumber');
            $table->string('type');
            $table->string('passengerName');
            $table->string('destination');
            $table->string('transportationCompany');
            $table->integer('rsoom');
            $table->integer('percentageAsasy');
            $table->integer('asasy');
            $table->integer('total');
            $table->integer('comission');
            $table->integer('comissionTax');
            $table->integer('bsp');
            $table->integer('sellprice');
            $table->integer('profit');
            $table->integer('safy');
            $table->string('paymentType');
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
