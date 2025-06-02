<?php

use Illuminate\Support\Facades\App;

return [

    'name' => env('APP_NAME', 'Laravel'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'file'),
    ],
    'providers'=>[
        \App\Providers\AppServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
        \Illuminate\Filesystem\FilesystemServiceProvider::class,
        \Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        \Illuminate\Database\DatabaseServiceProvider::class,
        \Illuminate\Auth\AuthServiceProvider::class,
        \Illuminate\View\ViewServiceProvider::class,
        \Illuminate\Translation\TranslationServiceProvider::class,     
        \Illuminate\Cache\CacheServiceProvider::class,
        \Illuminate\Validation\ValidationServiceProvider::class,
        \Illuminate\Hashing\HashServiceProvider::class,
        # queue.listeners
        \Illuminate\Queue\QueueServiceProvider::class,
        \Illuminate\Session\SessionServiceProvider::class,
    ],
    'aliases' => [
        'File' => Illuminate\Support\Facades\File::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'App' => Illuminate\Support\Facades\App::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
    ]   
];
