<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


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
Route::get('/posts', [TestController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [TestController::class, 'create'])->name('posts.create');
Route::post('/posts', [TestController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [TestController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [TestController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{id}', [TestController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [TestController::class, 'update'])->name('posts.update');

