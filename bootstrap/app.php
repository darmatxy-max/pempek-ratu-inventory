<?php

// Trik Pamungkas: Alihkan storage ke /tmp dari inti bootstrap
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

return Application::configure(basePath: dirname(__DIR__))
    ->useStoragePath($appStoragePath) // <-- Letak yang benar, sebelum routing
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