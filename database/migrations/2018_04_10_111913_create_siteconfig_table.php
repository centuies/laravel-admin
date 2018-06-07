<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteconfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteconfig', function (Blueprint $table) {
            $table->increments('id');
			$table->string('website_title')->nullable();
			$table->string('seo_title')->nullable();
			$table->string('seo_keywords')->nullable();
			$table->text('seo_description')->nullable();
			$table->string('info')->nullable();
			$table->string('icp_number')->nullable();
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
        Schema::dropIfExists('siteconfig');
    }
}
