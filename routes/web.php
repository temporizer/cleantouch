<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AnalyticsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/p/{slug}', [PageController::class, 'show'])->name('page.show');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/portfolio', [AdminPortfolioController::class, 'index'])->name('admin.portfolio.index');
    Route::get('/portfolio/create', [AdminPortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('/portfolio', [AdminPortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('/portfolio/{portfolioItem}/edit', [AdminPortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::put('/portfolio/{portfolioItem}', [AdminPortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('/portfolio/{portfolioItem}', [AdminPortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
    Route::post('/portfolio/{portfolioItem}/restore', [AdminPortfolioController::class, 'restore'])->name('admin.portfolio.restore');
    Route::delete('/portfolio/{portfolioItem}/force-delete', [AdminPortfolioController::class, 'forceDestroy'])->name('admin.portfolio.force-destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('admin.users.restore');
    Route::delete('/users/{user}/force-delete', [UserController::class, 'forceDestroy'])->name('admin.users.force-destroy');

    Route::get('/emails', [EmailController::class, 'index'])->name('admin.emails.index');
    Route::get('/emails/{message}', [EmailController::class, 'show'])->name('admin.emails.show');
    Route::delete('/emails/{message}', [EmailController::class, 'destroy'])->name('admin.emails.destroy');
    Route::post('/emails/{message}/restore', [EmailController::class, 'restore'])->name('admin.emails.restore');
    Route::delete('/emails/{message}/force-delete', [EmailController::class, 'forceDestroy'])->name('admin.emails.force-destroy');

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics.index');

    Route::get('/settings', [SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});
