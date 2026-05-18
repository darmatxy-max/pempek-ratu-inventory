<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            if (!Schema::hasColumn('pesanans', 'kurir')) {

                $table->string('kurir')->nullable();

            }

            if (!Schema::hasColumn('pesanans', 'no_resi')) {

                $table->string('no_resi')->nullable();

            }

            if (!Schema::hasColumn('pesanans', 'estimasi_sampai')) {

                $table->date('estimasi_sampai')->nullable();

            }

        });
    }

    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            if (Schema::hasColumn('pesanans', 'kurir')) {

                $table->dropColumn('kurir');

            }

            if (Schema::hasColumn('pesanans', 'no_resi')) {

                $table->dropColumn('no_resi');

            }

            if (Schema::hasColumn('pesanans', 'estimasi_sampai')) {

                $table->dropColumn('estimasi_sampai');

            }

        });
    }
};