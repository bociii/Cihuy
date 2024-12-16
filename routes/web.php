<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

#Route::get('/dashboard', function () {
#    return view('dashboard');
#})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('articles',[ArticleController::class, 'index'])->name('article.index');
    Route::get('articles/view',[ArticleController::class, 'viewAll'])->name('article.view');
    Route::get('articles/{article}/detail',[ArticleController::class,'detail'])->name('article.detail');
    Route::get('articles/create',[ArticleController::class, 'create'])->name('article.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('article.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('articles/search', [ArticleController::class, 'search'])->name('article.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');

    });

Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
