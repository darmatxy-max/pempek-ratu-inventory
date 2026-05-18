<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            // hapus kolom jika ada
            if (Schema::hasColumn('pesanans', 'kurir')) {
                $table->dropColumn('kurir');
            }

            if (Schema::hasColumn('pesanans', 'no_resi')) {
                $table->dropColumn('no_resi');
            }

            if (Schema::hasColumn('pesanans', 'estimasi_sampai')) {
                $table->dropColumn('estimasi_sampai');
            }

            if (Schema::hasColumn('pesanans', 'ekspedisi')) {
                $table->dropColumn('ekspedisi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            $table->string('kurir')->nullable();
            $table->string('no_resi')->nullable();
            $table->date('estimasi_sampai')->nullable();
            $table->string('ekspedisi')->nullable();
        });
    }
};