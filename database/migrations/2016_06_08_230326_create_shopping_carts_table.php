<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->text('message');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shopping_carts');
    }
}
