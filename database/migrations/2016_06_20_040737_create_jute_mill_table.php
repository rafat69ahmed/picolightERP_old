<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuteMillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('cold_storage_deed_receives', function (Blueprint $table) {
        //     $table->increments('id');
            
            // $table->string('booking_no');
            // $table->integer('reserve_potato_bags');
            // $table->double('rent_each_bag', 15, 2);

        //     $table->timestamps();
        //     $table->unsignedInteger('user_id')->nullable();
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
        Schema::create('jutemill_initial_jute_purchases', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('bill_no');
            $table->string('agent_name');
            $table->string('agent_business_name');
            $table->string('agent_address');
            $table->string('jute_type');
            $table->integer('number_of_bundle')->nullable();
            $table->double('total_weight', 15, 2);
            $table->string('details');
            $table->date('pusrchage_date');
            $table->string('payment_status'); //due or paid
            $table->string('note');



            $table->string('bank_paldge_status'); //wating or paldge or store
            $table->date('bank_paldge_date')->nullable();
            $table->string('bank_paldge_receiver_name');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

         Schema::create('jutemill_jute_bank_paldges', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('bank_paldge_no');
            $table->date('bank_paldge_date')->nullable();
            $table->double('total_weight', 15, 2);

            $table->string('all_bill_no');
            $table->string('all_jute_purchase_id');

            $table->double('grand_total_bank_paldge_kg', 15, 2);
            $table->double('grand_total_bank_paldge_quintal', 15, 2);
            $table->double('bank_paldge_balance_kg', 15, 2);
            $table->double('bank_paldge_balance_quintal', 15, 2);

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('jutemill_cash_deposits_pladge_accounts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('cash_deposits_no');
            $table->date('cash_deposit_date')-> nullable();
            $table->string('cash_deposit_note');

            $table->string('deposited_by_name');
            $table->string('bank_name');
            $table->string('bank_address');

            $table->double('diposit_amount', 15, 2);
            $table->double('grand_tolal_diposit', 15, 2);

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         
      });
        Schema::create('jutemill_bank_pladge_return_jutes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('bank_pladge_return_no');
            $table->date('bank_pladge_return_date')->nullable();
            $table->string('return_jute_type');
            $table->string('bank_pladge_authirity_name');
            $table->string('jutemill_authirity_name');  

            $table->double('return_quantity', 15, 2); //deduct from bank_paldge_balance_quintal
            $table->double('grand_total_return', 15, 2);

            $table->string('issue_status'); //issued , notissued , available
            $table->date('last_issue_date'); 
            $table->double('available_for_issue', 15, 2);

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


        ///production issue
        Schema::create('jutemill_jute_issues', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('jute_issue_no');
            $table->string('jute_seasoned_type');
            $table->string('jute_type');
            $table->string('issued_by');
            $table->string('received_by');

            $table->integer('number_of_bundle')->nullable();
            $table->string('details');
            $table->double('total_issue', 15, 2);
            $table->double('grand_total_issue', 15, 2);
            $table->date('jute_issue_date')->nullable();

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        ///store item list

        Schema::create('jutemill_store_items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('item_name');
            $table->string('item_code');
            $table->string('unit');
            $table->date('entry_date');

            
            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
         ///store Register

        Schema::create('jutemill_store_registers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('store_entry_no');
            $table->string('invoice_no');
            $table->string('item_name');
            $table->unsignedInteger('store_item_id')->nullable();
            $table->foreign('store_item_id')->references('id')->on('jutemill_store_items')->onDelete('cascade');

            $table->string('store_item_return'); //null or returned
            $table->double('return_quantity', 15, 2)->nullable();

            $table->date('entry_date');
            $table->string('unit');
            $table->double('quantity', 15, 2);
            $table->double('available_quantity', 15, 2);
            $table->double('grand_total_quantity', 15, 2);

            $table->string('issue_status'); //issued , notissued , available
            $table->date('last_issue_date'); 
            $table->double('issued_quantity')->nullable();//issued or notissued


            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        // mill issue others row meterials
        Schema::create('jutemill_other_issues', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('other_issue_no');

            $table->string('item_name');
            $table->unsignedInteger('store_item_id')->nullable();
            $table->foreign('store_item_id')->references('id')->on('jutemill_store_items')->onDelete('cascade');

            $table->date('entry_date');
            $table->string('unit');
            $table->double('quantity', 15, 2); //LIFO system diduction from jutemill_store_registers tabls quantity, available_quantity 
            $table->double('grand_total_other_issues', 15, 2);

            $table->string('issued_by');
            $table->string('received_by');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('jutemill_production_shifts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('shifts_title');
            $table->time('shift_start_time');
            $table->time('shift_end_time');
            $table->double('shift_hours', 2, 2);
            $table->string('shifts_discription');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
                ///production issue
        Schema::create('jutemill_jute_issues_productionline', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('jute_issue_productionline_no');
            $table->string('jute_seasoned_type'); //kacca, pacca, cutting
            // $table->string('jute_type');
            $table->string('issued_by');
            $table->string('received_by');

            $table->integer('weight_of_amount')->nullable();
            $table->string('details');
            $table->double('total_issue', 15, 2);
            $table->double('grand_total_issue', 15, 2);
            $table->date('jute_issue_in_productionline_date')->nullable();

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('jutemill_production_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('production_type_title');
            $table->string('unit');
            $table->string('production_type_discription');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        }); 

        Schema::create('jutemill_production_sub_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('production_sub_type_title');

            $table->unsignedInteger('production_type_id')->nullable();
            $table->foreign('production_type_id')->references('id')->on('jutemill_production_types')->onDelete('cascade');


            $table->string('unit');
            $table->string('production_sub_type_discription');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('jutemill_production_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_title');
            $table->string('discription');

            $table->string('production_type_title');
            $table->unsignedInteger('production_type_id')->nullable();
            $table->foreign('production_type_id')->references('id')->on('jutemill_production_types')->onDelete('cascade');

            $table->string('production_sub_type_title');
            $table->string('production_item_unit');
            $table->unsignedInteger('production_sub_type_id')->nullable();
            $table->foreign('production_sub_type_id')->references('id')->on('jutemill_production_sub_types')->onDelete('cascade');

            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('jutemill_production_by_shift', function (Blueprint $table) {
            $table->increments('id');
            $table->string('production_no');
            $table->string('shift_title');
            $table->string('shift_time');
            $table->date('jute_production_date')->nullable();

            $table->unsignedInteger('shift_id')->nullable();
            $table->foreign('shift_id')->references('id')->on('jutemill_production_shifts')->onDelete('cascade');

            $table->string('production_type_title');
            $table->unsignedInteger('production_type_id')->nullable();
            $table->foreign('production_type_id')->references('id')->on('jutemill_production_types')->onDelete('cascade');


            $table->string('production_sub_type_title');
            $table->unsignedInteger('production_sub_type_id')->nullable();
            $table->foreign('production_sub_type_id')->references('id')->on('jutemill_production_sub_types')->onDelete('cascade');

            $table->string('item_name');
            $table->string('item_unit');
            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('jutemill_production_items')->onDelete('cascade');

            $table->double('production_quantity', 15, 2);
            $table->double('grand_production_quantity', 15, 2);

            $table->string('status'); //user, delevery, instore
            $table->string('discription');
            $table->boolean('avilable');
            $table->double('available_quantity', 15, 2)->nullable();


            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('jutemill_production_delevery_or_use', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('production_delevery_or_use_no');
            $table->string('shift_title');
            $table->date('date')->nullable();

           
            $table->string('production_type_title');
            $table->unsignedInteger('production_type_id')->nullable();
            $table->foreign('production_type_id')->references('id')->on('jutemill_production_types')->onDelete('cascade');


            $table->string('production_sub_type_title');
            $table->unsignedInteger('sub_type_id')->nullable();
            $table->foreign('sub_type_id')->references('id')->on('jutemill_production_sub_types')->onDelete('cascade');
            

            $table->string('item_name');
            $table->string('item_unit');
            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('jutemill_production_items')->onDelete('cascade');

            $table->double('quantity', 15, 2);
            $table->boolean('is_saficiant'); 
            $table->double('required_quantity_left', 15, 2)->nullable();
            $table->string('status'); //user, delevery, instore, bankplaged, shortage
            $table->double('grand_production_quantity', 15, 2);

            $table->string('discription');


            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('jutemill_production_delevery_or_use');
        Schema::drop('jutemill_production_by_shift');
        Schema::drop('jutemill_production_items');
        Schema::drop('jutemill_production_sub_types');
        Schema::drop('jutemill_production_types');
        Schema::drop('jutemill_jute_issues_productionline');
        Schema::drop('jutemill_production_shifts');
        Schema::drop('jutemill_other_issues');
        Schema::drop('jutemill_store_registers');
        Schema::drop('jutemill_store_items');
        Schema::drop('jutemill_jute_issues');
        Schema::drop('jutemill_bank_pladge_return_jutes');
        Schema::drop('jutemill_cash_deposits_pladge_accounts');
        Schema::drop('jutemill_jute_bank_paldges');
        Schema::drop('jutemill_initial_jute_purchases');
    }
    
}