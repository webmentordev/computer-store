<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Product\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::middleware(['auth', 'verified', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // Product Routes
    Route::get('/products/listing', Products::class)->name('product.listing');


    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
});

require __DIR__.'/auth.php';