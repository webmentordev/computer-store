<?php

use App\Livewire\Home;
use App\Livewire\Dashboard;
use App\Livewire\Product\Products;
use App\Livewire\Stock\StocksHistory;
use Illuminate\Support\Facades\Route;
use App\Livewire\Categories\SubCategory;
use App\Livewire\Categories\MainCategory;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Stock\AddStock;

Route::get('/', Home::class)->name('home');

Route::middleware(['auth', 'verified', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Product Routes
    Route::get('/products/listing', Products::class)->name('product.listing');

    // Product Category Routes
    Route::get('/category/main', MainCategory::class)->name('category.main');
    Route::get('/category/sub', SubCategory::class)->name('category.sub');

    // Product Stock
    Route::get('/stock-history', StocksHistory::class)->name('stock.history');
    Route::get('/stock', AddStock::class)->name('stock');

    
    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
});

require __DIR__.'/auth.php';