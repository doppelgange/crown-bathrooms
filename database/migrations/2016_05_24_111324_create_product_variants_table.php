<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("product_id")->unsigned()->index();
            $table->string('code', 50);
            $table->string('name');
            $table->boolean('is_master')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('special_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products');
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
