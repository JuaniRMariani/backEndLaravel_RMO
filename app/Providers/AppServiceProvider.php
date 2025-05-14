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

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
    
    public function register(): void{
        $this->app->bind(EmailService::class, EmailServiceImpl::class);
        $this->app->bind(FavoriteService::class, FavoriteServiceImpl::class);
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
        $this->app->bind(JobOfferService::class, JobOfferServiceImpl::class);
    }

    
    public function boot(): void{
    }
}
