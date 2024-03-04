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
            $table->string('title');
            $table->integer('price');
            $table->integer('distributor_price');
            $table->string('product_code')->nullable()->unique();
            $table->string('thumbnail_image');
            $table->bigInteger('view_count')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_variational')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('sub_category_id')->references('id')->on('product_sub_categories');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('product_countries');
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
