<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\CasterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournamentController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::resource('/tournaments', TournamentController::class);
//     Route::resource('/casters', CasterController::class);
// });

// useless routes
// Just to demo sidebar dropdown links active states.
// Route::get('/buttons/text', function () {
//     return view('buttons-showcase.text');
// })->middleware(['auth'])->name('buttons.text');

// Route::get('/buttons/icon', function () {
//     return view('buttons-showcase.icon');
// })->middleware(['auth'])->name('buttons.icon');

// Route::get('/buttons/text-icon', function () {
//     return view('buttons-showcase.text-icon');
// })->middleware(['auth'])->name('buttons.text-icon');

// Route::get('/demo', function() {
//     return view('demo');
// });

require __DIR__ . '/auth.php';

Route::get('/start/{tournament}', [SceneController::class, 'start'])->name('start');
Route::get('/caster/{tournament}', [SceneController::class, 'caster'])->name('caster');

Route::get('/ajax/start/tournamentdetails/{tournament}', [AjaxController::class, 'FetchDetails']);
