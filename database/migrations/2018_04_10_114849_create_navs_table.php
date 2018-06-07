<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedinteger('pid');
			$table->string('name');
			$table->string('alias')->nullable();
			$table->string('link')->nullable();
			$table->string('icon')->nullable();
			$table->unsignedTinyInteger('status');
			$table->unsignedTinyInteger('target');
			$table->integer('sort');
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
        Schema::dropIfExists('navs');
    }
}
