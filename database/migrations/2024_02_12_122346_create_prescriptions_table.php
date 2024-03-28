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
        //Faire changement pour la connection avec le compte Laravel-DB DB::usingConnection('mysql-Laravel-DB')->unprepared('
        //Fichier config/database.php
        Schema::connection('mysql-Laravel-DB')->create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfPrescription')->max(255);
            $table->date('dateOfPrescription');
            $table->date('dateOfStart');
            $table->integer('durationOfPrescriptionInDays');
            $table->time('firstIntakeHour');
            $table->integer('frequencyBetweenDosesInHours');
            $table->integer('frequencyOfIntakeInDays')->default(1);
            $table->integer('frequencyPerDay')->default(0); //Only for data
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('medication_id')->constrained('medications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql-Laravel-DB')->dropIfExists('prescriptions');
    }
};
