<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('user_id');
            $table->integer('user_id');
            //$table->unsignedInteger('category_id');
            $table->integer('category_id');
            $table->string('title')->nullable();
            $table->longtext('content')->nullable();
            $table->longtext('excerpt')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('post_type')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('casecade');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('casecade');
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
