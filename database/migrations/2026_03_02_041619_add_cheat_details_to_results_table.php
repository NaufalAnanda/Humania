<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('results', function (Blueprint $table) {
        // Menambahkan kolom text yang boleh kosong (nullable)
        $table->text('cheat_details')->nullable()->after('cheat_count');
    });
}

public function down()
{
    Schema::table('results', function (Blueprint $table) {
        $table->dropColumn('cheat_details');
    });
}
};
