<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'about']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/kontak', [HomeController::class, 'contact']);
Route::post('/kontak', [HomeController::class, 'sendMessage'])->name('contact.send');

// Dashboard Admin (bisa diakses langsung)
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

// Routes untuk halaman admin lainnya
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Portfolio Management
    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('admin.portfolio');
    Route::get('/portfolio/create', [AdminController::class, 'createPortfolio'])->name('admin.portfolio.create');
    Route::post('/portfolio', [AdminController::class, 'storePortfolio'])->name('admin.portfolio.store');
    Route::get('/portfolio/edit/{id}', [AdminController::class, 'editPortfolio'])->name('admin.portfolio.edit');
    Route::put('/portfolio/{id}', [AdminController::class, 'updatePortfolio'])->name('admin.portfolio.update');
    Route::delete('/portfolio/{id}', [AdminController::class, 'deletePortfolio'])->name('admin.portfolio.delete');

    // Message Management
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::get('/messages/{id}', [AdminController::class, 'viewMessage'])->name('admin.messages.view');
    Route::put('/messages/{id}/read', [AdminController::class, 'markAsRead'])->name('admin.messages.read');
    Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('admin.messages.delete');
});
