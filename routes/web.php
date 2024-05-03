<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/detail_school/{id}', [HomeController::class,'detail_school']);

Route::get('/admins', [AdminController::class,'index']);

Route::get('/admins/list_school', [AdminController::class,'list_school']);

Route::get('/admins/save_school', [AdminController::class,'save_school']);
Route::post('/admins/save_school', [AdminController::class,'save_school']);


Route::get('/rate', [HomeController::class,'rate']);
Route::post('/rate', [HomeController::class,'rate']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
