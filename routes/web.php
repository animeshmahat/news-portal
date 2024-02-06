<?php

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

Auth::routes();

Route::get('/home',                             [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register',                         [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',                        [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::post('/logout',                          [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Admin routes
Route::group(['prefix' => '/admin',             'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'category',       'as' => 'category.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',             [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
        Route::get('/view/{id}',                [App\Http\Controllers\Admin\CategoryController::class, 'view'])->name('view');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'users',          'as' => 'users.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'profile',        'as' => 'profile.'], function () {
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\UserProfileController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\UserProfileController::class, 'update'])->name('update');
        Route::put('passwordChange/{id}',       [App\Http\Controllers\Admin\UserProfileController::class, 'passwordChange'])->name('passwordChange');
    });

    Route::group(['prefix' => 'post',           'as' => 'post.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
        Route::get('/view/{id}',                [App\Http\Controllers\Admin\PostController::class, 'view'])->name('view');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('delete');
        Route::post('/updateStatus/{id}',       [App\Http\Controllers\Admin\PostController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/updateFeatured/{id}',     [App\Http\Controllers\Admin\PostController::class, 'updateFeatured'])->name('updateFeatured');
    });

    Route::group(['prefix' => 'gallery',        'as' => 'gallery.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
        Route::get('/view/{id}',                [App\Http\Controllers\Admin\GalleryController::class, 'view'])->name('view');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\GalleryController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'album',          'as' => 'album.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\AlbumController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\AlbumController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\AlbumController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\AlbumController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\AlbumController::class, 'update'])->name('update');
        Route::get('/view/{id}',                [App\Http\Controllers\Admin\AlbumController::class, 'view'])->name('view');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\AlbumController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'video',          'as' => 'video.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\VideoController::class, 'index'])->name('index');
        Route::get('/create',                   [App\Http\Controllers\Admin\VideoController::class, 'create'])->name('create');
        Route::post('/',                        [App\Http\Controllers\Admin\VideoController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\VideoController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\VideoController::class, 'update'])->name('update');
        Route::get('/view/{id}',                [App\Http\Controllers\Admin\VideoController::class, 'view'])->name('view');
        Route::get('/delete/{id}',              [App\Http\Controllers\Admin\VideoController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'setting',        'as' => 'setting.'], function () {
        Route::get('/',                         [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('index');
        Route::get('/edit/{id}',                [App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('edit');
        Route::put('/update/{id}',              [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update');
        Route::get('/edit_site_image/{id}',     [App\Http\Controllers\Admin\SettingController::class, 'edit_site_image'])->name('edit_site_image');
        Route::put('/update_site_image/{id}',   [App\Http\Controllers\Admin\SettingController::class, 'update_site_image'])->name('update_site_image');
        Route::get('/edit_socials/{id}',        [App\Http\Controllers\Admin\SettingController::class, 'edit_socials'])->name('edit_socials');
        Route::put('/update_socials/{id}',      [App\Http\Controllers\Admin\SettingController::class, 'update_socials'])->name('update_socials');
    });
});

//Site routes
Route::group(['as' => 'site.',                  'namespace' => 'Site'], function () {
    Route::get('/',                             [App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
    Route::get('/post/{slug}',                  [App\Http\Controllers\Site\SiteController::class, 'single_post'])->name('single_post');
    Route::get('/category/{title}',             [App\Http\Controllers\Site\SiteController::class, 'category_page'])->name('category_page');
});
