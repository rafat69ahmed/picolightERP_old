<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStorageClientRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cold_storage_client_registers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('client_code');
        $table->string('client_name');
        $table->string('client_address');
        $table->string('mobile_no');
        $table->string('national_id_no');
        $table->string('status');
        $table->timestamps();

        // user information
        $table->string('name');
        $table->unsignedInteger('user_id')->nullable();
        $table->foreign('user_id')
        ->references('id')
        ->on('users')
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
        //
        Schema::drop('cold_storage_client_registers');
    }
}
