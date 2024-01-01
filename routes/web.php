<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\DashboardController;
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

// Route::get('/app', function () {
//     return view('admin.layouts.app');
// });

Route::get("/admin",                        [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/category',                 [App\Http\Controllers\Admin\CategoryController::class, 'category'])->name('category');
    Route::get('/create_category',          [App\Http\Controllers\Admin\CategoryController::class, 'create_category'])->name('create_category');
    Route::get('/news',                     [App\Http\Controllers\Admin\NewsController::class, 'news'])->name('news');
    Route::get('/create_news',              [App\Http\Controllers\Admin\NewsController::class, 'create_news'])->name('create_news');
});
