<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ItemController;

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


 // Display All Collections
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [CollectionController::class,'index'])->name('dashboard');

    Route::group(['prefix' => 'collection', 'as' => 'collection.'], function () {
        Route::post('/', [CollectionController::class,'store'])->name('store');
        Route::delete('/{collectionId}', [CollectionController::class,'destroy'])->name('destroy');
        Route::get('/{collectionId}', [CollectionController::class, 'edit'])->name('edit');
        Route::put('/{collectionId}', [CollectionController::class,'update'])->name('update');

        Route::group(['prefix' => '{collectionId}/item', 'as' => 'item.'], function () {
            Route::post('/', [ItemController::class,'store'])->name('store');
            Route::delete('/{itemId}', [ItemController::class,'destroy'])->name('destroy');
            Route::get('/list', [ItemController::class,'index'])->name('index');
            Route::get('/{itemId}', [ItemController::class,'edit'])->name('edit');
            Route::put('/{itemId}', [ItemController::class,'update'])->name('update');
      });

  });
});

require __DIR__.'/auth.php';
