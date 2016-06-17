<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
            $table->increments('id');
            $table->integer("post_category_id")->unsigned()->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->enum('post_status',['active','inactive'])->default('active');
            $table->timestamps();

            $table->foreign('post_category_id')
                ->references('id')->on('post_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
