<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PterodactylController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// user route
Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('/product',[ProductController::class,'index'])->name('user.product');

    // transaction
    Route::get('/order/{id_product}',[TransactionController::class,'index'])->name('transaction');
    Route::post('/get-snap-token', [TransactionController::class, 'getSnapToken'])->name('start.payment');
});

// admin route
Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    
    // product
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/admin/product/create',[ProductController::class,'create'])->name('admin.product.create');
    Route::post('/admin/product/create',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::put('/admin/product/edit/{id}',[ProductController::class,'update'])->name('admin.product.update');

    // category
    Route::get('/admin/category',[CategoryController::class,'index'])->name('admin.category');
    Route::get('/admin/category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::get('/admin/category/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('/admin/category/create',[CategoryController::class,'store'])->name('admin.category.store');
    Route::put('/admin/category/edit',[CategoryController::class,'update'])->name('admin.category.update');

    // user
    Route::get('/admin/user',[AdminController::class,'viewUser'])->name('admin.user');
    Route::delete('/admin/user/delete/{id}',[AdminController::class,'destroyUser'])->name('admin.user.delete');
    Route::get('/admin/user/edit/{id}',[AdminController::class,'editUser'])->name('admin.user.edit');
    Route::put('/admin/user/edit/{id}',[AdminController::class,'updateUser'])->name('admin.user.update');

    // pterodactyl
    Route::get('/admin/pterodactyl',[PterodactylController::class,'index'])->name('admin.pterodactyl');
    Route::get('/admin/pterodactyl/{id}',[PterodactylController::class,'show'])->name('admin.pterodactyl.show');
});