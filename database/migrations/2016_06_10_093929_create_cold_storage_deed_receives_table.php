<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStorageDeedReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cold_storage_deed_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deed_no');
            $table->unsignedInteger('potato_receipt_id')->nullable();
            $table->string('booking_no');
            $table->integer('reserve_potato_bags');
            $table->double('rent_each_bag', 15, 2);
            $table->double('total_rent', 15, 2);
            $table->integer('empty_bags');
            $table->double('empty_bags_price' , 15, 2);
            $table->double('empty_bags_total_price_' , 15, 2);
            $table->double('loan' , 15, 2);
            $table->double('transport_cost' , 15, 2);
            $table->double('sub_total' , 15, 2);
            $table->string('potato_type');
            $table->string('weight_each_potato_bag');
            $table->string('note');
            $table->timestamps();
 
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
        });

         Schema::create('cold_storage_potato_distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('withdrawal_date');
            $table->string('gp_no');
            $table->integer('bags_delevery_quantity');
            $table->integer('rest_bags_quantity');
            $table->double('rent_collect' , 15, 2);
            $table->double('loan_collect' , 15, 2);
            $table->double('loan_interest_collect' , 15, 2);
            $table->double('transport_cost_collect' , 15, 2);
            $table->double('empty_bags_price_collect' , 15, 2);
            $table->double('sub_total_amount' , 15, 2);

            $table->timestamps();

            //$table->string('name');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedInteger('deed_receive_id')->nullable();
            $table->foreign('deed_receive_id')
            ->references('id')
            ->on('cold_storage_deed_receives')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cold_storage_potato_distributions');
        
        Schema::drop('cold_storage_deed_receives');

    }
}
