<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColdStorageAgentRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cold_storage_agent_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_code');
            $table->string('agent_name');
            $table->string('agent_address');
            $table->string('mobile_no');
            $table->string('national_id_no');
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
        Schema::drop('cold_storage_agent_registers');
    }
}
