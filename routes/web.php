<?php

use App\Http\Controllers\Admin\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin",                        [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth'])->name('admin');

Route::group(['prefix' => 'category',       'as' => 'category.', 'middleware' => ['auth']], function () {
    Route::get('/',                         [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
    Route::get('/create',                   [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
    Route::post('/',                        [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',             [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
    Route::get('/view/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'view'])->name('view');
    Route::get('/delete/{id}',              [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');

    Route::get('/news',                     [App\Http\Controllers\Admin\NewsController::class, 'news'])->name('news');
    Route::get('/create_news',              [App\Http\Controllers\Admin\NewsController::class, 'create_news'])->name('create_news');
});

Route::group(['prefix' => 'users',          'as' => 'users.', 'middleware' => ['auth']], function () {
    Route::get('/',                         [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
    Route::get('/create',                   [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'post',           'as' => 'post.', 'middleware' => ['auth']], function () {
    Route::get('/',                         [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
    Route::get('/create',                   [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
});

Auth::routes();

Route::get('/home',                         [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register',                     [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',                    [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::post('/logout',                      [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
