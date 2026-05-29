<?php
// 1. Paksa Vercel menggunakan folder sementara (/tmp) karena sistem Vercel Read-Only
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp';
putenv('VIEW_COMPILED_PATH=/tmp');

// 2. Bypass semua folder storage yang mungkin hilang karena Git
putenv('CACHE_STORE=array');
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// 3. Tampilkan error asli (jika masih ada) ke layar browser
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 4. Jalankan mesin utama Laravel
require __DIR__ . '/../public/index.php';