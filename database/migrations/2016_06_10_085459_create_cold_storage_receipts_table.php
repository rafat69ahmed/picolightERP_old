<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStorageReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cold_storage_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_receipt_no');
            $table->string('sr_no');
            $table->date('issue_date');
            $table->string('agent_name');
            $table->string('agent_code');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('party_name');
            $table->string('party_fathers_name');
            $table->string('party_address');
            // $table->string('village');
            // $table->string('post_office');
            $table->string('party_mobile_no');
            $table->integer('no_of_potato_bags');
            // $table->string('potato_info');
            $table->string('potato_type');
            $table->double('loan', 15, 2);
            $table->double('transport_cost', 15, 2);
            $table->integer('empty_bags');

            $table->timestamps();


            // user information
            $table->string('name');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('agent_id')
            ->references('id')
            ->on('cold_storage_agent_registers')
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
        Schema::drop('cold_storage_receipts');
    }
}
