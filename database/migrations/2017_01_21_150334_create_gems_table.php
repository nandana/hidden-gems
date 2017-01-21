<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('mine_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('geohash');
            $table->integer('amount');
            $table->string('address')->nullable();
            $table->integer('max_participants');
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
        Schema::table('gems', function (Blueprint $table) {
            Schema::dropIfExists('gems');
        });
    }
}
