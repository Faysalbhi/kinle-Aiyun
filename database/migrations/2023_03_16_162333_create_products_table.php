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
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('product_name');
            $table->string('slug');
            $table->integer('product_price');
            $table->integer('discount')->default(0);
            $table->integer('after_discount');
            $table->string('brand')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->longText('additional_info')->nullable();
            $table->string('preview')->nullable();
            $table->softDeletes();
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
