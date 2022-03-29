<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MakeUrlController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Artisan;
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

Route::prefix('article')
    ->controller(ArticleController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/', 'store');
    });

Route::get('/makeurl', [MakeUrlController::class, 'index'])
    ->name('makeurl.index');

Route::get('/makeurl/{makeurl:title}', [MakeUrlController::class, 'show'])
    ->name('makeurl.show');


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
