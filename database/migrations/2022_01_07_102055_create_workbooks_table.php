<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workbooks', function (Blueprint $table) {
            $table->id();
            $table->integer('rezume_id');
            $table->string('old_company_name')->nullable();
            $table->string('position_name')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
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
        Schema::dropIfExists('workbooks');
    }
}
