<?php

use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Http\Middleware\HandleCors;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        $middleware->web(append: [
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);

        $middleware->api(prepend: [
            EnsureFrontendRequestsAreStateful::class,

        ]);
        //https://laravel.com/docs/12.x/sanctum
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            //vai verificar todas habilidades do token de api.
            ////ATENÇÃO NA HORA DE FAZER AS ROTAS, PARA PROTEGER. NO FIM DA ROUTE })->middleware(['auth:sanctum', 'abilities: router');
            'ability' => CheckForAnyAbility::class,
            // aqui vai garantir pelo menos uma.
            //ATENÇÃO NA HORA DE FAZER AS ROTAS, PARA PROTEGER. NO FIM DA ROUTE })->middleware(['auth:sanctum', 'ability:moderator,admin']);
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        //Aceita a requisições do react
        $middleware->prepend(HandleCors::class);
    })

    ->withExceptions(function (Exceptions $exceptions) {


    })->create();
