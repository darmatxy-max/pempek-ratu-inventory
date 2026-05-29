<?php
// 1. Trik X-Ray: Paksa Laravel merespons dengan JSON agar tidak memuat tampilan (view)
$_SERVER['HTTP_ACCEPT'] = 'application/json';

// 2. Alihkan folder kompilasi ke /tmp yang diizinkan Vercel
putenv('VIEW_COMPILED_PATH=/tmp');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';

// 3. Jalankan mesin utama
require __DIR__ . '/../public/index.php';