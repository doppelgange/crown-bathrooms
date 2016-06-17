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
            $table->integer('product_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->enum('resource_type', ['image', 'attachment']);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
            ;

            $table->foreign('resource_id')
                ->references('id')->on('resources')
                ->onDelete('cascade')
            ;
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
