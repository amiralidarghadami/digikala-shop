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
            $table->string('name');
            $table->string('tracking_code');
            $table->bigInteger('price')->default(0);
            $table->integer('discount')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('featured')->default(false);
            $table->date('discount_duration')->nullable();
            $table->foreignId('seller_id')->nullable()->constrained();
            $table->foreignId('category_id')->constrained();
            $table->enum('status',['active','inactive','stop_selling'])->default('inactive');
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
