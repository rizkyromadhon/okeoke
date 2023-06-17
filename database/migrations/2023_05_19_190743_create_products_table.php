<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_short_des');
            $table->text('product_long_des');
            $table->integer('price');
            $table->string('product_category_name');
            $table->string('product_subcategory_name');
            $table->integer('product_category_id');
            $table->integer('product_subcategory_id');
            $table->string('product_img');
            $table->string('slug');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT search(product_name, product_category_name)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
