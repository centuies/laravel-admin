<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('pid');
			$table->string('name');
			$table->string('alias')->nullable();
			$table->string('icon')->nullable();
			$table->string('picture')->nullable();
			$table->longText('content')->nullable();
			$table->unsignedTinyInteger('type');
			$table->string('list_template')->nullable();
			$table->string('detail_template')->nullable();
			$table->integer('sort')->default(0);	
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
        Schema::dropIfExists('category');
    }
}
