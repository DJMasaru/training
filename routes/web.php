<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::group(['middleware'=> 'auth'],function(){
    Route::controller(ArticleController::class)->group(function() {
        Route::get('/index', 'index')->name('index');
        Route::get('article/create', 'create')->name('article.create');
        Route::post('article/create', 'store')->name('article.store');
        Route::patch('article/{id}/update', 'update')->name('article.update');
        Route::get('article/{id}/edit', 'edit')->name('article.edit');
        Route::get('article/{id}', 'show')->name('article.show');
        Route::delete('article/{id}/destroy', 'destroy')->name('article.destroy');
    });
});
