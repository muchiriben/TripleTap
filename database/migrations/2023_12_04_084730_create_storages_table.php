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
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('serial_no');
            $table->string('fc_no');
            $table->string('item_type');
            $table->string('model');
            $table->string('duration');
            $table->dateTime('expected_deposit_date');
            $table->dateTime('actual_deposit_date')->nullable();
            $table->dateTime('actual_collection_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storages');
    }
};
