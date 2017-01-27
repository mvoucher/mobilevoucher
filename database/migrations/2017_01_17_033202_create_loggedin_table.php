<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggedinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loggedins', function(Blueprint $table)
        {  
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->timestamp('last_login_at');
            $table->string('last_login_ip', 45);
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
          Schema::drop('loggedins');
    }
}
