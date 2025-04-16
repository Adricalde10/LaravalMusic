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
        Schema::create('cancons', function (Blueprint $table) {
            $table->id();
            $table->string('Titol');
            $table->string('Durada');
            $table->string('Data_llançament');
            $table->string('Album_id');
            $table->string('Artista_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancons');
    }
};
