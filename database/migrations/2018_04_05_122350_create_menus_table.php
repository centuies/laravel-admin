<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedSmallInteger('pid')->default(0);
			$table->string('menu_name');
			$table->string('route')->nullable();
			$table->string('icon')->nullable();
			$table->tinyInteger('status')->default(0);
			$table->integer('menu_sort')->default(0);			
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
        Schema::dropIfExists('menus');
    }
}
