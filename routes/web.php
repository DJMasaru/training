<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// app.blade.phpはレイアウト。実のデータを持ってくるためにはdashboardをリンク先として指定すること。
// Route::get('/', function () {
//     return view('layouts/dashboard');
// });

// ①リンク先で/が指定されたらarticleという名前がついたページに遷移する
Route::redirect('/', 'article');

// ②articleという名前がついたページにいくと、ArticleControllerのクラスが呼び出される
Route::resource('article', ArticleController::class);
