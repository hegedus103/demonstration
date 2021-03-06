<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
          
             $table->increments('id');
            $table->string('name',255);
            $table->string('username',20)->unique();
            $table->string('email',190)->unique();
            $table->string('tenyeszetkod',190)->unique();
            $table->string('password',250);
            $table->string('token');
            $table->integer('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
