<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Compagnies;
use App\Models\Aeroports;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vols', function (Blueprint $table) {
            $table->foreignIdFor(Compagnies::class)->constrained();
            $table->foreignIdFor(Aeroports::class, 'aeroport_id_depart')->constrained();
            $table->foreignIdFor(Aeroports::class, 'aeroport_id_arivee')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vols', function (Blueprint $table) {
            //
        });
    }
};
