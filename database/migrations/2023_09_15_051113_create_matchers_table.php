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
        Schema::create('matchers', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('therapist_id');
            $table->string('tracking_number');
            $table->integer('approval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchers');
    }
};
