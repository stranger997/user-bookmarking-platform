<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarksController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::group(['prefix' => 'bookmarks'], function() {
        Route::get('/', [BookmarksController::class, 'index'])->name('bookmarks.index');
        Route::get('/create', [BookmarksController::class, 'create'])->name('bookmarks.create');
        Route::post('/', [BookmarksController::class, 'store'])->name('bookmarks.store');
        Route::get('/{bookmark}/edit', [BookmarksController::class, 'edit'])->name('bookmarks.edit');
        Route::put('/{bookmark}', [BookmarksController::class, 'update'])->name('bookmarks.update');
    });
});

require __DIR__.'/auth.php';
