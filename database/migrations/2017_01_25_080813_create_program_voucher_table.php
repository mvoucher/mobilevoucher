<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('user_vouchertype', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('vouchertype_id')->unsigned();
            $table->integer('org_id')->unsigned(); //creater of that type
            $table->timestamps();           
        });

        Schema::table('user_vouchertype', function(Blueprint $table) {
            $table->foreign('vouchertype_id')->references('id')->on('vouchertypes');
            $table->foreign('org_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('user_vouchertype');
    }
}
