<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('results', function (Blueprint $table) {
            // Tambahkan kolom result_label (nullable karena bisa kosong untuk tes Kognitif)
            $table->string('result_label')->nullable()->after('score');

            // Tambahkan kolom cheat_count (default 0) untuk menyimpan jumlah pelanggaran
            $table->integer('cheat_count')->default(0)->after('result_label');
        });
    }

    public function down(): void
    {
        Schema::table('results', function (Blueprint $table) {
            // Untuk membatalkan jika di-rollback
            $table->dropColumn(['result_label', 'cheat_count']);
        });
    }
};
