<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
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
            $table->integer('batch_id');
            $table->integer('voucherno');
            $table->integer('serialno');
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
          Schema::drop('vouchernos');
    }
}
