<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            if (!Schema::hasColumn('pesanans', 'kode_invoice')) {

                $table->string('kode_invoice')
                      ->nullable()
                      ->after('id');

            }

        });
    }

    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {

            if (Schema::hasColumn('pesanans', 'kode_invoice')) {

                $table->dropColumn('kode_invoice');

            }

        });
    }
};