<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
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

Route::controller(ArticleController::class)->group(function() {
    Route::get('/index', 'index')->name('index');
    Route::get('/index/article/{id}', 'show')->name('article.show');
    Route::get('/index/category/uncategorized', 'showUncategorized')->name('article.category.uncategorized');
    Route::get('/index/category/{id}', 'category')->name('article.category');
});

Auth::routes();
Route::group(['middleware'=> 'auth'],function(){
    Route::controller(AdminDashboardController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/dashboard/article/create', 'create')->name('dashboard.article.create');
        Route::post('/dashboard/article/create', 'store')->name('dashboard.article.store');
        Route::patch('/dashboard/article/{id}/update', 'update')->name('dashboard.article.update');
        Route::get('/dashboard/article/{id}/edit', 'edit')->name('dashboard.article.edit');
        Route::get('/dashboard/article/{id}', 'show')->name('dashboard.article.show');
        Route::delete('/dashboard/article/{id}/destroy', 'destroy')->name('dashboard.article.destroy');
    });
});
