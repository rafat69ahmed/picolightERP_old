<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStoragePotatoDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {

    //     Schema::create('cold_storage_potato_distributions', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->date('withdrawal_date');
    //         $table->string('gp_no');
    //         $table->integer('bags_delevery_quantity');
    //         $table->integer('rest_bags_quantity');
    //         $table->double('rent_collect' , 15, 2);
    //         $table->double('loan_collect' , 15, 2);
    //         $table->double('loan_interest_collect' , 15, 2);
    //         $table->double('transport_cost_collect' , 15, 2);
    //         $table->double('empty_bags_price_collect' , 15, 2);
    //         $table->double('sub_total_amount' , 15, 2);
            // $table->unsignedInteger('deed_receive_id');

        // Schema::create('cold_storage_potato_distributions', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->date('withdrawal_date');
        //     $table->string('gp_no');
        //     $table->integer('bags_delevery_quantity');
        //     $table->integer('rest_bags_quantity');
        //     $table->double('rent_collect' , 15, 2);
        //     $table->double('loan_collect' , 15, 2);
        //     $table->double('loan_interest_collect' , 15, 2);
        //     $table->double('transport_cost_collect' , 15, 2);
        //     $table->double('empty_bags_price_collect' , 15, 2);
        //     $table->double('sub_total_amount' , 15, 2);


        //     $table->timestamps();


        //     $table->string('name');
        //     $table->unsignedInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('deed_receive_id')->references('id')->on('cold_storage_deed_receives');
        // });

        //     //$table->string('name');
        //     $table->unsignedInteger('user_id')->nullable();
        //     $table->foreign('user_id')
        //     ->references('id')
        //     ->on('users')
        //     ->onDelete('cascade');

        //     $table->unsignedInteger('deed_receive_id')->nullable();
        //     $table->foreign('deed_receive_id')
        //     ->references('id')
        //     ->on('cold_storage_deed_receives')
        //     ->onDelete('cascade');

        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('cold_storage_potato_distributions');
    }
}
