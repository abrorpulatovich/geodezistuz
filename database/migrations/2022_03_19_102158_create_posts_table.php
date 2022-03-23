<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->string('title');
            $table->text('short_desc');
            $table->text('desc');
            $table->integer('added_user')->nullable();
            $table->date('publish_date');
            $table->tinyInteger('status');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('p_order');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
