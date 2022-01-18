<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rezumes', function (Blueprint $table) {
            $table->string('salary')->after('skill');
            $table->boolean('salary_hidden')->after('salary');
            $table->boolean('is_active')->after('salary_hidden');
            $table->boolean('is_published')->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rezumes', function (Blueprint $table) {
            //
        });
    }
}
