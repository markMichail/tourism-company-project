<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('safe_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('receiptable_id');
            $table->string('receiptable_type');
            $table->string('type');
            $table->string('description');
            $table->integer('total_amount');
            $table->date('receipt_date');
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->foreign('safe_id')->references('safe_id')->on('safe');
        });
        DB::statement("ALTER TABLE receipts AUTO_INCREMENT = 20000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
