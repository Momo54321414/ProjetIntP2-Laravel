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
        //Faire changement pour la connection avec le compte Laravel-DB DB::usingConnection('mysql2')->unprepared('
        //Fichier config/database.php
        Schema::connection('mysql2')->create('logs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('actionTimestamp')->unique();
            $table->string('action');
            $table->foreignId('device_id')->constrained('devices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql2')->dropIfExists('logs');
    }
};
