<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProjectController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/project/{project:title}', [ProjectController::class, 'show'])
    ->name('project.show')
    ->missing(fn ($request) => response()->view('errors.project-not-found'));

Route::controller(HelloController::class)
    ->prefix('hello')
    ->name('hello.')
    ->group(function () {
        Route::get('/', [HelloController::class, 'index'])->name('index');
        Route::get('/create', [HelloController::class, 'create'])->name('create');
        Route::post('/', [HelloController::class, 'store'])->name('store');
    });


require __DIR__ . '/auth.php';
