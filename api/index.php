<?php
// Paksa PHP menampilkan error ke layar apapun yang terjadi
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Cek apakah database bisa konek
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Jika ada error, tampilkan detailnya tanpa ampun
    echo "<h1>KRITIS! Laravel Gagal Menjalankan Aplikasi</h1>";
    echo "<p><strong>Pesan:</strong> " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
    exit;
}