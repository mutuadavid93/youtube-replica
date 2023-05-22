<?php

use App\Http\Controllers\{ProfileController, VideosController};
use App\Models\Video;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', fn() => Inertia::render('Welcome'));

Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');

require __DIR__ . '/auth.php';
