<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToSpecialists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $specialists = array(
            array('id' => '1','name' => 'Geodezist'),
            array('id' => '2','name' => 'Topograf'),
            array('id' => '3','name' => 'Geolog'),
            array('id' => '4','name' => 'Injener geodezist'),
            array('id' => '5','name' => 'Injener topograf'),
            array('id' => '6','name' => 'Injener geolog'),
            array('id' => '7','name' => 'Texnik geodezist'),
            array('id' => '8','name' => 'Texnik topograf'),
            array('id' => '9','name' => 'Texnik geolog'),
            array('id' => '10','name' => 'Yetakchi injener topograf'),
            array('id' => '11','name' => 'Burg‘ulovchi'),
            array('id' => '12','name' => 'Yordamchi burg‘ulovchi'),
            array('id' => '13','name' => 'Podzemshik'),
            array('id' => '14','name' => 'Injener podzemshik'),
            array('id' => '15','name' => 'Kartograf'),
            array('id' => '16','name' => 'Injener kartograf'),
            array('id' => '17','name' => 'Kameralchik'),
            array('id' => '18','name' => 'Shofyor'),
        );
        DB::table('specialists')->insert($specialists);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specialists', function (Blueprint $table) {
            //
        });
    }
}
