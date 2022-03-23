<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSOrderColumnSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialists', function (Blueprint $table) {
            $table->integer('status')->after('name')->default(2);
            $table->integer('s_order')->after('status');
            $table->string('slug', 500)->after('s_order')->nullable();
            $table->string('icon', 300)->after('slug')->nullable();
            $table->string('color', 100)->after('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
