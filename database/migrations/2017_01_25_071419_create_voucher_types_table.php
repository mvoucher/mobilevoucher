<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('vouchertypes', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');            
            $table->string('category');
            $table->string('color');
            $table->integer('value'); //money
            $table->integer('user_id')->unsigned(); //organisation id
            $table->timestamps();           
        });

        Schema::table('vouchertypes', function(Blueprint $table) {
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
          Schema::drop('vouchertypes');
    }
}
