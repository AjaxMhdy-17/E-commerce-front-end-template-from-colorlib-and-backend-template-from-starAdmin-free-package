<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand_names')->onDelete('cascade');

            $table->string("name");
            $table->string("code");
            $table->string("quantity");
            $table->text("details");
            $table->string("color");
            $table->string("size");
            $table->string("selling_price");
            $table->string("discount_price")->nullable();
            $table->string("video_link")->nullable();
            $table->integer("main_slider")->nullable();
            $table->integer("hot_deal")->nullable();
            $table->integer("best_rated")->nullable();
            $table->integer("mid_slider")->nullable();
            $table->integer("hot_new")->nullable();
            $table->integer("trend")->nullable();
            $table->string("image_one")->nullable();
            $table->string("image_two")->nullable();
            $table->string("image_three")->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
