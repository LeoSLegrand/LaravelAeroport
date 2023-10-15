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
        Schema::create('aeroports', function (Blueprint $table) {
            $table->id();
            $table->string('nom_aeroport');
            $table->string('ville_aeroport');
            $table->integer('code');
            $table->string('nombre_piste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeroports');
    }
};
