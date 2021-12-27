<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('product_category_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->double('price');
            $table->integer('quantity');
            $table->double('discount')->nullable();
            $table->double('weight')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('featured');
            $table->string('tag')->nullable();

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
        Schema::dropIfExists('products');
    }
}
