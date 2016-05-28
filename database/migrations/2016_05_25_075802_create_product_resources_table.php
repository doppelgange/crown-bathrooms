<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->integer("product_id")->unsigned()->nullable()->index();
            $table->enum('type', ['image', 'attachment']);
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
        Schema::drop('product_resources');
    }
}
