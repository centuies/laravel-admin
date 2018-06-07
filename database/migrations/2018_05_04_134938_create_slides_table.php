<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('cid');
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('image')->nullable();
			$table->string('link')->nullable();	
			$table->string('target',6);
			$table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('slides');
    }
}
