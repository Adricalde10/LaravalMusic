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
        Schema::create('Songs', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('Titol')->nullable();
            $table->string('Durada')->nullable();
            $table->dateTime('Data_llançament')->nullable();
            $table->string('Album_id')->nullable();
            $table->string('Artista_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
