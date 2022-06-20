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
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('categury_id')->references('id')->on('productcateguries')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('price');
            $table->string('user_price');
            $table->text('disc');//discription
            $table->text('short_disc');//short discription
            $table->text('cover_img');//cover img url
            $table->text('Key_features');
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
