<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pos\CategoryController;
use App\Http\Controllers\pos\MenuController;
use App\Http\Controllers\pos\ModifierController;
use App\Http\Controllers\pos\OderController;
use App\Http\Controllers\pos\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('public.welcome');
    Route::get('/menu', 'menu')->name('public.menu');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(UserController::class)->group(function () {
    Route::get('/all/user', 'index')->name('all.user');
    Route::post('/store/user', 'store')->name('user.store');
    // Route::get('/edit/category', 'EditCategory')->name('edit.category');
    // Route::post('/update/category', 'UpdateCategory')->name('category.update');
    // Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::post('/store/category', 'StoreCategory')->name('category.store');
    Route::get('/edit/category', 'EditCategory')->name('edit.category');
    Route::post('/update/category', 'UpdateCategory')->name('category.update');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
});


Route::controller(MenuController::class)->group(function () {
    Route::get('/all/menu', 'AllMenu')->name('all.menu');
    Route::post('/store/menu', 'StoreMenu')->name('menu.store');
    Route::get('/edit/menu', 'EditMenu')->name('edit.menu');
    Route::post('/update/menu', 'UpdateMenu')->name('menu.update');
    Route::get('/delete/menu/{id}', 'DeleteMenu')->name('delete.menu');
});


Route::controller(ModifierController::class)->group(function () {

    Route::get('/all/modifier', 'index')->name('all.modifier');
    Route::post('/store/modifier', 'store')->name('modifier.store');
    Route::get('/edit/menu', 'EditMenu')->name('edit.modifier');
    Route::post('/update/modifier', 'update')->name('modifier.update');
    Route::get('/delete/modifier/{id}', 'DeleteModifier')->name('delete.modifier');
});

Route::controller(OderController::class)->group(function () {

    Route::get('/add/oder', 'addOder')->name('add.oder');
    // Route::post('/store/modifier', 'store')->name('modifier.store');
    // Route::get('/edit/menu', 'EditMenu')->name('edit.modifier');
    // Route::post('/update/modifier', 'update')->name('modifier.update');
    // Route::get('/delete/modifier/{id}', 'DeleteModifier')->name('delete.modifier');
});
require __DIR__ . '/auth.php';
