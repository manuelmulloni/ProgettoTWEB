<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => IsAdmin::class,
        ]);
        // https://laravel.com/docs/12.x/authentication#redirecting-authenticated-users
        // Di default, se un utente autenticato riprova ad accedere alla pagina di login, viene reindirizzato alla route `dashboard`.
        // Nel nostro progetto la pagina di default, sia per gli account autenticati che per quelli non autenticati, è la home page.
        $middleware->redirectUsersTo(fn(Request $request) => route('primaview'));
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
