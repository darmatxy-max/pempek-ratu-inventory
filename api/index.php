<?php
// Nyalakan detektor error
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Alihkan semua riwayat dan cache ke folder sementara Vercel (/tmp)
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';
putenv('VIEW_COMPILED_PATH=/tmp');
$_ENV['CACHE_DRIVER'] = 'array';
putenv('CACHE_DRIVER=array');
$_ENV['SESSION_DRIVER'] = 'cookie';
putenv('SESSION_DRIVER=cookie');
$_ENV['LOG_CHANNEL'] = 'stderr';
putenv('LOG_CHANNEL=stderr');

// Panggil mesin utama bawaan Laravel
require __DIR__ . '/../public/index.php';