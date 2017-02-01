<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('agents', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->integer('age');   
            $table->string('district');
            $table->string('sub_county');         
            $table->string('village');
            $table->string('mm_phonenumber');
            $table->integer('dealer_id')->unsigned(); //dealer of the agent
            $table->integer('program_id')->unsigned(); //programme id
            $table->integer('user_id')->unsigned(); //logged in user id
            $table->timestamps();           
        });

        Schema::table('agents', function(Blueprint $table) {
            $table->foreign('dealer_id')->references('id')->on('dealers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('program_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('agents');
    }
}
