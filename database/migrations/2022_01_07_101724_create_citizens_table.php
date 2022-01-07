<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('passport');
            $table->string('full_name');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->boolean('gender');
            $table->integer('specialist_id');
            $table->string('phone_number', 20);
            $table->string('birth_date');
            $table->integer('skill');
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
        Schema::dropIfExists('citizens');
    }
}
