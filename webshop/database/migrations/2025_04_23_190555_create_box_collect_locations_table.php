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
        Schema::create('box_collect_locations', function (Blueprint $table) {
            $table->id();
        $table->string('name');       // Pl. „Bratislava - Avion”
        $table->string('address');    // Pl. „Ivanská cesta 16, 821 04 Bratislava”
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_collect_locations');
    }
};
