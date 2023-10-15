<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Console\UpCommand;
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

Route::get('/', [PostController::class, 'index'])->name('index');

Route::post('/create', [PostController::class, 'create'])->name('create');

Route::get('/filter', [PostController::class, 'filter'])->name('filter');

Route::delete('delete/{id}', [PostController::class, 'delete'])->name('delete');

Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');

Route::put('update/{id}', [PostController::class, 'update'])->name('update');

Route::get('view/{id}', [PostController::class, 'view'])->name('view');