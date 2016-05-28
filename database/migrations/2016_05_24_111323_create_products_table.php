<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->nullable();
            $table->string('name')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('special_price', 10, 2)->nullable();
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
        Schema::drop('products');
    }
}
