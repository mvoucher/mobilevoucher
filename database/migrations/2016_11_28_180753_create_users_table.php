<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 30);
            $table->string('telephone')->unique();
            $table->string('district');
            $table->integer('role_id')->unsigned();
            $table->integer('org_id')->default(0);
            $table->integer('prog_id')->default(0);
            $table->string('photo')->nullable();
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('seen')->default(false);
            $table->boolean('valid')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_code')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->rememberToken();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
