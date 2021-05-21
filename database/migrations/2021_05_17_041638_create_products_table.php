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
            $table->string('product_code')->unique();
            $table->unsignedBigInteger('brand_id');
            $table->string('product_title');
            $table->string('product_avatar');
            $table->bigInteger('product_gender');
            $table->string('product_origin');
            $table->bigInteger('product_size');
            $table->string('product_band');
            $table->string('product_color');
            $table->string('product_case');
            $table->string('product_glass');
            $table->string('product_des')->nullable();
            $table->bigInteger('product_price');
            $table->bigInteger('product_quantity')->default(0);
            $table->bigInteger('product_guarantee')->default(12);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')
            ->onDelete('cascade');
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
