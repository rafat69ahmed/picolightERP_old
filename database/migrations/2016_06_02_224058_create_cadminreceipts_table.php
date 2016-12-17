<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadminreceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadminreceipts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('booking_no');

            $table->string('as_ar_no');
            $table->string('issue_date');

            $table->string('agent_name');
            $table->string('code_no');

            $table->string('party_name');
            $table->string('fathers_name');
            $table->string('village');
            $table->string('post_office');
            $table->string('mobile_no');

            $table->string('no_of_bags');
            $table->string('potato_info');
            $table->string('due_cost');
            $table->string('transport_cost');
            $table->string('empty_bags');


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
        Schema::drop('cadminreceipts');
    }
}
