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
            $table->id();
            $table->string('type');
            $table->unsignedInteger('user_id');
            $table->string('unique_id');
            $table->string('title');
            $table->string('slug')->unique;
            $table->string('thumbnail')->nullable();
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->boolean('featured');
            $table->string('url');
            $table->unsignedInteger('visitor');
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
        Schema::dropIfExists('posts');
    }
}
