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
        Schema::create('attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('color_id')->unsigned()->default(1);
            $table->integer('size_id')->unsigned()->default(1);
            $table->integer('manufacture_id')->unsigned()->default(1);
            $table->integer('product_id')->unsigned()->default(1);
            $table->integer('categories_id')->unsigned()->default(1);
            $table->index('color_id');
            $table->index('size_id');
            $table->index('manufacture_id');
            $table->index('product_id');
            $table->index('categories_id');
            $table->foreign('color_id')->references('id')->on('colors')->cascadeOnDelete();
            $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnDelete();
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('categories_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attrs');
    }
};
