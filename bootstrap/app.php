<?php

// Trik Pamungkas: Alihkan storage ke /tmp
$appStoragePath = '/tmp/storage';

if (!is_dir($appStoragePath)) {
    mkdir($appStoragePath, 0777, true);
    mkdir($appStoragePath.'/framework/views', 0777, true);
    mkdir($appStoragePath.'/framework/cache', 0777, true);
    mkdir($appStoragePath.'/framework/cache/data', 0777, true);
    mkdir($appStoragePath.'/framework/sessions', 0777, true);
    mkdir($appStoragePath.'/logs', 0777, true);
}

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// 1. Buat aplikasinya terlebih dahulu
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// 2. Override path SETELAH aplikasi berhasil dibuat
$app->useStoragePath($appStoragePath);

// 3. Kembalikan aplikasi yang sudah dimodifikasi
return $app;