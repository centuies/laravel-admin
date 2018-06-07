<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');	
			$table->string('password');
			$table->unsignedTinyInteger('status')->default(0);        
			$table->timestamp('last_login')->nullable();
			$table->string('ip_address')->nullable();
			$table->unsignedInteger('auth_group')->nullable();
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
        //
    }
}
