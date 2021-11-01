<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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
Route::middleware(['auth'])->group(function(){

Route::view('/', 'index')->name('root');

Route::group(['prefix' => 'products', 'as' => 'products.'], function(){

    Route::get('/', [ProductsController::class, 'index'])->name('index');
    Route::get('/create', [ProductsController::class, 'create'])->name('create');
    Route::post('/create', [ProductsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductsController::class, 'edit'])->name('edit');
    Route::put('/{id}/edit', [ProductsController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [ProductsController::class, 'delete'])->name('delete');
});

Route::resource('users', UserController::class);

});

require __DIR__.'/auth.php';
