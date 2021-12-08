<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;

// use App\Http\Controllers\Category\CategoryController;

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

// Site :
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('site.index');


// Admin :
Route::middleware(['auth', 'checkrole'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::get('/show/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    });
    
    Route::prefix('articles')->group(function(){
        Route::get('/', [ArticleController::class, 'index'])->name('admin.articles.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('admin.articles.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('admin.articles.store');
        Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('admin.articles.edit');
        Route::put('/update/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
        Route::get('/destroy/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    });

});

   
// User :
Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update'); 












Route::get('/test', [TestController::class, 'index'])->name('test');