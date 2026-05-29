<?php
// Paksa Laravel menggunakan mode memori saja (tidak menulis ke disk)
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'array';
$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp'; // Vercel mengizinkan /tmp

// Nyalakan error untuk debugging
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Panggil aplikasi
require __DIR__ . '/../public/index.php';