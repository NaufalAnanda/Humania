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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id(); // Tetap angka, biarkan Laravel yang urus

            $table->string('module_id')->unique(); // <-- INI UNTUK COG-01
            $table->string('test_code')->unique(); // <-- INI UNTUK TOKEN (X7K9A)

            $table->string('title');
            $table->text('description');
            $table->integer('duration')->default(0);
            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
