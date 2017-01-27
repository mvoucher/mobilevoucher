<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('batchs', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('vouchertype_id')->unsigned();
            $table->integer('quantity'); //number of vouchers
            $table->integer('user_id')->unsigned(); //programme id
            $table->timestamps();          
        });

        Schema::table('batchs', function($table) {
            $table->foreign('vouchertype_id')->references('id')->on('vouchertypes');
            $table->foreign('user_id')->references('id')->on('users'); 
   });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('batchs');
    }
}