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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');

            //individual
            $table->string('individual_name')->nullable();
            $table->integer('individual_age')->nullable();
            $table->string('individual_phone')->nullable();
            $table->integer('individual_national_id')->nullable();
            $table->string('individual_location')->nullable();
            $table->string('individual_proffession')->nullable();

            //group
            $table->string('leader_name')->nullable();
            $table->string('leader_phone')->nullable();
            $table->integer('leader_national_id')->nullable();
            $table->string('leader_location')->nullable();
            $table->string('group_relation')->nullable();
            $table->integer('from_age')->nullable();
            $table->integer('to_age')->nullable();
            $table->integer('group_no')->nullable();

            $table->string('payment_status');
            $table->string('agreement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
