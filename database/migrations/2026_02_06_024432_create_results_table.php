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
        Schema::create('results', function (Blueprint $table) {
            $table->id(); // ID unik hasil tes

            // RELASI: Menghubungkan ke tabel user & assessment
            // Artinya: Data ini milik User ID sekian, mengerjakan Soal ID sekian
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');

            // Data Hasilnya
            $table->integer('score'); // Nilai (misal: 85)
            $table->string('status'); // Status (misal: 'Selesai', 'Pending')

            $table->timestamps(); // Mencatat kapan tes dikerjakan (created_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
