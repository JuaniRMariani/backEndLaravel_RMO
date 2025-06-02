<?php

namespace App\Providers;

use App\Contracts\EmailService;
use App\Contracts\FavoriteService;
use App\Contracts\AuthService;
use App\Contracts\CategoryService;
use App\Contracts\JobOfferService;

use App\Services\EmailServiceImpl;
use App\Services\FavoriteServiceImpl;
use App\Services\AuthServiceImpl;
use App\Services\CategoryServiceImpl;
use App\Services\JobOfferServiceImpl;
use Illuminate\Foundation\FileBasedMaintenanceMode;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
    
    public function register(): void{
        $this->app->bind(EmailService::class, EmailServiceImpl::class);
        $this->app->bind(FavoriteService::class, FavoriteServiceImpl::class);
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
        $this->app->bind(JobOfferService::class, JobOfferServiceImpl::class);

        $this->app->bind('hash', function ($app) {
            return $app->make(\Illuminate\Contracts\Hashing\Hasher::class);
        });

        $this->app->singleton(
            \Illuminate\Contracts\Foundation\MaintenanceMode::class,
            function ($app) {
                return new FileBasedMaintenanceMode(
                    $app->storagePath().'/framework/down',
                );
            }
        );
    }

    
    public function boot(): void{
    }
}
