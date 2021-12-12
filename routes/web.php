<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Author\AuthorController;

Auth::routes();

// Site :
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('site.index');
// نمایش مطلب مورد نظر با کلیک بر روی ادامه مطلب
Route::get('/articles/{article}', [App\Http\Controllers\Site\ArticleController::class, 'show'])->name('site.articles.show'); 
// نمایش مطالب مربوط به یک دسته بندی خاص
Route::get('/categories/{category}', [App\Http\Controllers\Site\CategoryController::class, 'show'])->name('site.categories.show');


// Admin :
Route::middleware(['auth', 'checkrole'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.users.update'); 
        Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    

    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        // Route::get('/show/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
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


// Author :

Route::middleware(['auth'])->prefix('author')->group(function(){
    Route::get('dashboard', [AuthorController::class, 'index'])->name('author.dashboard');
    
    Route::prefix('/categories')->group(function(){
        Route::get('/', [App\Http\Controllers\Author\CategoryController::class, 'index'])
            ->name('author.categories.index');
        Route::post('/store', [App\Http\Controllers\Author\CategoryController::class, 'store'])
            ->name('author.categories.store');
        Route::get('/edit/{category}', [App\Http\Controllers\Author\CategoryController::class, 'edit'])
            ->name('author.categories.edit');
    });

    Route::prefix('articels')->group(function(){
        Route::get('/', [App\Http\Controllers\Author\ArticleController::class, 'index'])
            ->name('author.articles.index');
        Route::get('/create', [App\Http\Controllers\Author\ArticleController::class, 'create'])
            ->name('author.articles.create');
        Route::post('/store', [App\Http\Controllers\Author\ArticleController::class, 'store'])
            ->name('author.articles.store');
        Route::get('/edit/{article}', [App\Http\Controllers\Author\ArticleController::class, 'edit'])->name('author.articles.edit');
        Route::put('/update/{article}', [App\Http\Controllers\Author\ArticleController::class, 'update'])->name('author.articles.update');
        Route::get('/destroy/{article}', [App\Http\Controllers\Author\ArticleController::class, 'destroy'])->name('author.articles.destroy');
            
    });
}); 








Route::get('/test', [TestController::class, 'index'])->name('test');