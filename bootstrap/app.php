<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api: __DIR__.'/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->append(\App\Http\Middleware\TrustProxies::class);

        // Daftarkan global middleware web stack:
        $middleware->web();

        // Middleware alias custom kamu
        $middleware->alias([
            'auth' => Authenticate::class,
            'profesi' => \App\Http\Middleware\CheckProfesi::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
