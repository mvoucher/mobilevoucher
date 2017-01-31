<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('vouchernos', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('batch_id')->unsigned();
            $table->string('voucherno');
            $table->string('replacement')->nullable();
            $table->timestamps();           
        });

        Schema::table('vouchernos', function(Blueprint $table) {
            $table->foreign('batch_id')->references('id')->on('batchs');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('vouchernos');
    }
}