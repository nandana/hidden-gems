<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGemsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gems_images', function (Blueprint $table) {
            $table->integer('gem_id')->unsigned();
            $table->integer('image_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gems_images', function (Blueprint $table) {
            Schema::dropIfExists('gems_images');
        });
    }
}
