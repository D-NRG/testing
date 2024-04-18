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
            $table->integer('colors_id')->unsigned()->default(1);
            $table->integer('sizes_id')->unsigned()->default(1);
            $table->integer('manufactures_id')->unsigned()->default(1);
            $table->integer('products_id')->unsigned()->default(1);
            $table->integer('categories_id')->unsigned()->default(1);
            $table->index('colors_id');
            $table->index('sizes_id');
            $table->index('manufactures_id');
            $table->index('products_id');
            $table->index('categories_id');
            $table->foreign('colors_id')->references('id')->on('colors')->cascadeOnDelete();
            $table->foreign('sizes_id')->references('id')->on('sizes')->cascadeOnDelete();
            $table->foreign('manufactures_id')->references('id')->on('manufactures')->cascadeOnDelete();
            $table->foreign('products_id')->references('id')->on('products')->cascadeOnDelete();
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
