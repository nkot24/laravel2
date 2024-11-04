<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;


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

Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::get('/blog/{slug}', [PostsController::class, 'show']);
Route::post('/blog', [PostsController::class, 'store']);
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit']);
Route::delete('/blog/{slug}', [PostsController::class, 'destroy']);
Route::put('/blog/{slug}', [PostsController::class, 'update']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
