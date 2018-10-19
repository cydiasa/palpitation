<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaffeineIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caffeine_intakes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caffeine_source_id')->unsigned();
            $table->foreign('caffeine_source_id')->references('id')->on('caffeine_sources');
            $table->integer('units');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caffeine_intakes');
    }
}
