<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CompaniesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('cors')->group(function () {
    Route::get('/users/getAll', [UsersController::class, 'getAll'])->name('users.getAll');
    Route::get('/companies/getAll', [CompaniesController::class, 'getAll'])->name('companies.getAll');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/user', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UsersController::class, 'delete'])->name('users.delete');
    
    
    Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
    Route::post('/company', [CompaniesController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}/update', [CompaniesController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}/delete', [CompaniesController::class, 'delete'])->name('companies.delete');
});

require __DIR__.'/auth.php';
