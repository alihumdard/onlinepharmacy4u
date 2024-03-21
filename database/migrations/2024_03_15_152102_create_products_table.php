<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->text('title')->unique();
            $table->text('short_desc');
            $table->text('desc');
            $table->text('main_image');
            $table->integer('price');
            $table->string('stock');
            $table->string('SKU')->nullable();
            $table->string('barcode')->nullable();
            $table->string('ext_tax');
            $table->string('status')->default('1');
            $table->unsignedBigInteger('category_id');
            $table->integer('sub_category')->nullable();
            $table->integer('child_category')->nullable();
            $table->integer('product_template');
            $table->text('question_category')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
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
};
