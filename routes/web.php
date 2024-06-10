<?php

use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CommentController;
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
    return view('homepage');
});

Route::get('/tips', function () {
    return view('tips');
})->name('tips');

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

    // route untuk cetak data dalam bentuk PDF
    Route::get('dashboard/userpdf', [HomeController::class, 'user_pdf'])->name('users.pdf');
    Route::get('dashboard/userexcel', [HomeController::class, 'user_excel'])->name('users.excel');
    Route::get('dashboard/commentspdf', [HomeController::class, 'comments_pdf'])->name('comments.pdf');

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
Route::get('/', [ViewController::class, 'showHomePage']);

//route untuk komentar
Route::get('/kata-mereka', [CommentController::class, 'index'])->name('comments.index');
//route untuk add komentar
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

//route untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/comments', [CommentController::class, 'adminIndex'])->name('admin.comments.index');
    Route::patch('/admin/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
