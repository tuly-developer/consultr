<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('fullname')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('durability')->nullable();
            $table->integer('power')->nullable();
            $table->integer('combat')->nullable();
            $table->unsignedBigInteger('race_id')->nullable();
            $table->string('height_feet')->nullable();
            $table->string('height_cm')->nullable();
            $table->string('weight_lb')->nullable();
            $table->string('weight_kg')->nullable();
            $table->unsignedBigInteger('eye_color_id')->nullable();
            $table->unsignedBigInteger('hair_color_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
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
        Schema::dropIfExists('superheroes');
    }
}