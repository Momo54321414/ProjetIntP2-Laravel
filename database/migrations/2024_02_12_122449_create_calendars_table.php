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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->date('dateOfIntake');
            $table->time('hourOfIntake');
           /*Ajouter cet attribut lorsque les tests seront concluant pour les triggers associés à cette table*/
            $table->boolean('active')->default(1);
            $table->foreignId('prescription_id')->constrained('prescriptions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
