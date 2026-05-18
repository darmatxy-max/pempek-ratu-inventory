<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('produks', function (Blueprint $table) {

        if (!Schema::hasColumn('produks', 'status')) {
            $table->string('status')->default('ready');
        }

        if (!Schema::hasColumn('produks', 'deskripsi')) {
            $table->text('deskripsi')->nullable();
        }

    });
}

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {

            $table->dropColumn([
                'status_produk',
                'deskripsi',
                'is_active'
            ]);

        });
    }
};