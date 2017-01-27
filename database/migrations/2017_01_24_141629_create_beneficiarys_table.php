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
            $table->integer('user_id'); //programme id
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
          Schema::drop('beneficiarys');
    }
}
