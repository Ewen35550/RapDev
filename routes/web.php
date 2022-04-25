<?php

use App\Http\Controllers\RapController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/rappeurs', [RapController::class, 'index'])->name('rappeurs');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        Route::get('/admin/rappeurs', [AdminController::class, 'index_rap'])->name('admin.rappeurs');
        Route::get('/admin/rappeurs/{id}', [AdminController::class, 'show_rap']);
        Route::get('/admin/create/rappeur', [AdminController::class, 'create_rap']);
        Route::post('/admin/rappeurs/update', [AdminController::class, 'update_rap']);
        Route::post('/admin/add/rappeur', [AdminController::class, 'add_rap']);

        Route::get('/admin/albums', [AdminController::class, 'index_albums'])->name('admin.albums');
        Route::get('admin/albums/{id}', [AdminController::class, 'show_album']);
        Route::get('admin/create/album', [AdminController::class, 'create_album']);
        Route::post('admin/albums/update', [AdminController::class, 'update_album']);
        Route::post('admin/add/album', [AdminController::class, 'add_album']);

        Route::get('/r/track/{id}', [TrackController::class, 'read'])->name('read_track');
    });
});

require __DIR__.'/auth.php';
