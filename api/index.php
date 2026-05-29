<?php
// Nyalakan detektor error
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

// Muat komponen inti Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// 1. Pindahkan seluruh "organ dalam" Laravel ke folder /tmp
$app->useStoragePath('/tmp/storage');

// 2. Buat jalur foldernya secara otomatis
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 3. Tangkap Request pengguna
$request = Illuminate\Http\Request::capture();

// 4. Proses dan TAMPILKAN ke layar browser (Bagian krusial yang sebelumnya terlewat)
if (method_exists($app, 'handleRequest')) {
    // Mode Laravel 11
    $response = $app->handleRequest($request);
    $response->send();
} else {
    // Mode Laravel 10 ke bawah
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
}