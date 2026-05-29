<?php
// Nyalakan semua detektor error bawaan PHP
ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    // Jalankan mesin utama Laravel
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Jika Laravel mati diam-diam, tangkap dan cetak error aslinya ke layar!
    echo "<div style='font-family: sans-serif; padding: 20px; background: #ffebee; color: #cc0000; border-radius: 8px; margin: 20px; border: 2px solid #ffcdd2;'>";
    echo "<h2 style='margin-top: 0;'>🚨 Error Asli Tertangkap!</h2>";
    echo "<strong>Pesan:</strong> " . $e->getMessage() . "<br><br>";
    echo "<strong>Lokasi File:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")<br><br>";
    echo "<strong>Stack Trace:</strong><br><pre style='background: #fff; padding: 10px; overflow-x: auto; font-size: 12px; border: 1px solid #ffcdd2;'>" . $e->getTraceAsString() . "</pre>";
    echo "</div>";
}