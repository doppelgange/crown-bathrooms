<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->integer('product_variant_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('shopping_cart_id')
                ->references('id')->on('shopping_carts');
            $table->foreign('product_variant_id')
                ->references('id')->on('product_variants');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shopping_cart_items');
    }
}
