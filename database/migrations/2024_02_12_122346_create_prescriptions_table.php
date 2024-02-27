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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfPrescription');
            $table->date('dateOfPrescription');
            $table->date('dateOfStart');
            $table->integer('durationOfPrescriptionInDays');
            $table->integer('frequencyBetweenDosesInHours');
            $table->integer('frequencyPerDay');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('medication_id')->constrained('medications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};