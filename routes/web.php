<?php

use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\BlogController;
use App\Http\Controllers\web\CodeController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ProjectController;
use Illuminate\Support\Facades\Route;



Route::controller(AdminController::class)->prefix('/')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ROUTE FRONTEND 🟢
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/home', 'index')->name('home');
});

Route::controller(BlogController::class)->prefix('/blog')->group(function () {
    Route::get('/', 'index')->name('blog');
});

Route::controller(CodeController::class)->prefix('/code')->group(function () {
    Route::get('/', 'index')->name('code');
});

Route::controller(AboutController::class)->prefix('/about')->group(function () {
    Route::get('/', 'index')->name('about');
});

Route::controller(ProjectController::class)->prefix('/project')->group(function () {
    Route::get('/', 'index')->name('project');
});
/*
|--------------------------------------------------------------------------
| END ROUTE FRONTEND 🟤
|--------------------------------------------------------------------------
*/
