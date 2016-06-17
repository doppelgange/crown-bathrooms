<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_images', function (Blueprint $table) {
            $table->integer('product_variant_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_variant_id')
                ->references('id')->on('product_variants')
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
        Schema::drop('product_variant_images');
    }
}
