<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStorageLoanReceivePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cold_storage_loan_receive_papers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('sl_no');
            $table->string('booking_no');
            $table->date('date');
            $table->date('potato_store_date');
            $table->double('loan_amount' , 15, 2);
            $table->double('interest_rate' , 15, 2);
            $table->string('deed_no');
            $table->unsignedInteger('potato_receipt_id')->nullable();
             // user information
            $table->string('name');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('potato_receipt_id')
            ->references('id')
            ->on('cold_storage_receipts')
            ->onDelete('cascade');

            $table->timestamps();
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cold_storage_loan_receive_papers');
    }
}
