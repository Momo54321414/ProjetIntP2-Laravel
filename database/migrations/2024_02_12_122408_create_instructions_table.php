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
        Schema::connection('mysql-Laravel-DB')->create('instructions', function (Blueprint $table) {
            $table->id();
            $table->text('instructions');
            $table->foreignId('medication_id')->constrained('medications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql-Laravel-DB')->dropIfExists('instructions');
    }
};
