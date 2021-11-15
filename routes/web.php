<?php

use App\Http\Controllers\GlobalNotesController;
use App\Http\Controllers\likedNotesController;
use App\Http\Controllers\personnalNotesController;
use App\Http\Controllers\sharedNotesController;
use App\Http\Controllers\tagsNotesController;
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
});

Route::resource('/global-note', GlobalNotesController::class);

Route::resource('/liked-note', likedNotesController::class);
Route::resource('/personnal-note', personnalNotesController::class);
Route::resource('/shared-note', sharedNotesController::class);
Route::resource('/tag-note', tagsNotesController::class );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
