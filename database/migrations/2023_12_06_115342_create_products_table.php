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
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('purchase_price')->nullable();
            $table->integer('selling_price');
            $table->longText('description');
            $table->integer('quantity');
            $table->string('image');
            $table->string('imageId');
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
