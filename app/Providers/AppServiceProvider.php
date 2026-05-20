<?php

namespace App\Providers;

use App\Models\ContactMessage;
use App\Models\PortfolioItem;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('portfolioItem', fn ($value) => PortfolioItem::withTrashed()->findOrFail($value));
        Route::bind('message', fn ($value) => ContactMessage::withTrashed()->findOrFail($value));
        Route::bind('user', fn ($value) => User::withTrashed()->findOrFail($value));
    }
}
