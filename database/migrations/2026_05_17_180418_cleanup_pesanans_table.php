<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            if (Schema::hasColumn('pesanans', 'kode_pesanan')) {
                $table->dropColumn('kode_pesanan');
            }

            if (Schema::hasColumn('pesanans', 'nomor_resi')) {
                $table->dropColumn('nomor_resi');
            }

            if (Schema::hasColumn('pesanans', 'status_pengiriman')) {
                $table->dropColumn('status_pengiriman');
            }

        });
    }

    public function down(): void
    {

    }
};