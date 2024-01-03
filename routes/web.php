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

Route::group(['prefix' => 'category',       'as' => 'category.'], function () {
    Route::get('/',                         [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
    Route::get('/create',                   [App\Http\Controllers\Admin\CategoryController::class, 'create_category'])->name('create');
    Route::post('/',                        [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'edit_category'])->name('edit');
    Route::post('/update/{id}',             [App\Http\Controllers\Admin\CategoryController::class, 'update_category'])->name('update');
    Route::get('/view/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'view_category'])->name('view');
    Route::get('/delete/{id}',              [App\Http\Controllers\Admin\CategoryController::class, 'delete_category'])->name('delete');

    Route::get('/news',                     [App\Http\Controllers\Admin\NewsController::class, 'news'])->name('news');
    Route::get('/create_news',              [App\Http\Controllers\Admin\NewsController::class, 'create_news'])->name('create_news');
});
