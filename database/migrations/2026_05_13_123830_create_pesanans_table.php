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
        Schema::create('pesanans', function (Blueprint $table) {
    $table->id();

    $table->foreignId('customer_id');

    $table->string('jenis_pesanan');

    $table->date('tanggal_preorder')->nullable();

    $table->integer('total_harga');

    $table->string('status_pesanan')
          ->default('menunggu');

    $table->string('status_pembayaran')
          ->default('belum bayar');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
