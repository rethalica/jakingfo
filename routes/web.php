<?php

use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('destinations', DestinationController::class);
//     Route::resource('events', EventController::class);
// });

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('destinations', DestinationController::class);
    Route::resource('events', EventController::class);
});

// Route::get('/destinations', [ViewController::class, 'destination_index']);
// Route::get('/destinations/{id}', [ViewController::class, 'destination_show']);
// Route::get('/events', [ViewController::class, 'event_index']);
// Route::get('/events/{id}', [ViewController::class, 'event_show']);

Route::get('/destinations', [ViewController::class, 'destination_index'])->name('destinations.index');
Route::get('/destinations/{id}', [ViewController::class, 'destination_show'])->name('destinations.show');
Route::get('/events', [ViewController::class, 'event_index'])->name('events.index');
Route::get('/events/{id}', [ViewController::class, 'event_show'])->name('events.show');
