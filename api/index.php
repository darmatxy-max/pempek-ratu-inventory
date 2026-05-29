<?php
// Nyalakan detektor error
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

// Muat komponen inti Laravel
require __DIR__ . '/../vendor/autoload.php';
// paksa deploy ke vercel 1
$app = require_once __DIR__.'/../bootstrap/app.php';

// 1. Pindahkan seluruh "organ dalam" Laravel ke folder /tmp (bebas akses di Vercel)
$app->useStoragePath('/tmp/storage');

// 2. Buat jalur foldernya secara otomatis agar Laravel tidak panik
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

// 3. Nyalakan mesin utama!
$app->handleRequest(Illuminate\Http\Request::capture());