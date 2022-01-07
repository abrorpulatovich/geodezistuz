<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->integer('company_inn');
            $table->string('company_name');
            $table->string('full_name');
            $table->string('company_phone_number', 20);
            $table->integer('specialist_id');
            $table->integer('skill'); //talab qilingan staj
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
        Schema::dropIfExists('companies');
    }
}
