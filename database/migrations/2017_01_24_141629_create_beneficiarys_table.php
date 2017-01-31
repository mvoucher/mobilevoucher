<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('beneficiarys', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('gender');
            $table->integer('age');            
            $table->string('location');
            $table->integer('user_id')->unsigned(); //programme id
            $table->timestamps();           
        });

        Schema::table('beneficiarys', function(Blueprint $table) {
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
          Schema::drop('beneficiarys');
    }
}
