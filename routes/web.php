<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/', [SiteController::class, 'index'])->name('site.index');


// Post :
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');


// Category :
// Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

// Admin :

Route::prefix('/admin')->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user/{user_id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/{user_id}', [UserController::class, 'update'])->name('admin.user.update');

    // Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
});




Route::prefix('/admin/categories')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
});
