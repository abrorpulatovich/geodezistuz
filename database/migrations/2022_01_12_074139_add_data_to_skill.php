<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToSkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $skills = array(
            array('id' => '1','name' => 'Farqi yo‘q'),
            array('id' => '2','name' => '0-3 yil'),
            array('id' => '3','name' => '3-5 yil'),
            array('id' => '4','name' => '5-8 yil'),
            array('id' => '5','name' => '8 yildan yuqori')
        );
        DB::table('skills')->insert($skills);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill', function (Blueprint $table) {
            //
        });
    }
}
