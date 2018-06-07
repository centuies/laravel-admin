<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('cid');
			$table->string('title');
			$table->string('author')->nullable();
			$table->string('introduction', 1000)->nullable();
			$table->text('content')->nullable();
			$table->string('picture')->nullable();
			$table->unsignedTinyInteger('status')->default(0);
			$table->unsignedTinyInteger('is_top')->default(0);
			$table->unsignedTinyInteger('is_recommend')->default(0);
			$table->integer('sort')->default(0);
			$table->integer('read')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
