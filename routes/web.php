<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GlobalNotesController;
use App\Http\Controllers\likedNotesController;
use App\Http\Controllers\personnalNotesController;
use App\Http\Controllers\sharedNotesController;
use App\Http\Controllers\tagsNotesController;
use App\Models\Note;
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

Route::get('/', [GlobalNotesController::class, 'index'])->middleware(['blockMobileDevice']);

Route::middleware(['auth'])->group(function () {

    Route::resource('/global-note', GlobalNotesController::class)->except('index');
    Route::put('/global-note/like/{noteId}', [GlobalNotesController::class, 'like']);
    Route::put('/global-note/unlike/{noteId}', [GlobalNotesController::class, 'unlike']);
    
    Route::resource('/liked-note', likedNotesController::class)->middleware(['blockMobileDevice']);
    
    Route::resource('/personnal-note', personnalNotesController::class);
    
    Route::post('/personnal-note/share/{noteId}', [personnalNotesController::class, 'share']);
    
    Route::resource('/shared-note', sharedNotesController::class);
    
    Route::resource('/tag-note', tagsNotesController::class );
    
    Route::post('/log-out', [LogoutController::class, 'logout']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
