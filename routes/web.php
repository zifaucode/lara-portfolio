<?php

use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\AdminAboutController;
use App\Http\Controllers\web\AdminBlogController;
use App\Http\Controllers\web\AdminCodeController;
use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\AdminProjectController;
use App\Http\Controllers\web\AdminSettingController;
use App\Http\Controllers\web\AdminTaskController;
use App\Http\Controllers\web\BlogController;
use App\Http\Controllers\web\CategoryBlogController;
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



/*
|--------------------------------------------------------------------------
| ROUTE PAGE ADMIN 🟢
|--------------------------------------------------------------------------
*/
// Route::group(['middleware' => 'admin'], function () {

Route::controller(AdminController::class)->prefix('/dashboard')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(AdminBlogController::class)->prefix('/admin/blog')->group(function () {
    Route::get('/home', 'index')->name('admin-blog.home');
    Route::get('/', 'index')->name('admin-blog.index');
    Route::get('/create', 'create')->name('admin-blog.create');
    Route::get('/detail/{id}', 'show')->name('admin-blog.show');
    Route::get('/edit/{id}', 'edit')->name('admin-blog.edit');
    Route::get('/persetujuan', 'persetujuan')->name('admin-blog.persetujuan');
    Route::post('/{id}', 'update')->name('admin-blog.update');
    Route::patch('/status/{id}', 'status')->name('admin-blog.status');
    Route::post('/', 'store')->name('admin-blog.store');
    Route::delete('/{id}', 'destroy')->name('admin-blog.destroy');
});

Route::controller(CategoryBlogController::class)->prefix('/admin/blog')->group(function () {
    Route::get('/category', 'index')->name('admin-blog-category.index');
    Route::patch('/category/{id}', 'update')->name('admin-blog-category.update');
    Route::post('/category', 'store')->name('admin-blog-category.store');
    Route::delete('/category/{id}', 'destroy')->name('admin-blog-category.destroy');
});

Route::controller(AdminProjectController::class)->prefix('/admin/project')->group(function () {
    Route::get('/', 'index')->name('admin-project.index');
    Route::get('/create', 'create')->name('admin-project.create');
    Route::get('/edit/{id}', 'edit')->name('admin-project.edit');
    Route::get('/detail/{id}', 'detail')->name('admin-project.detail');
    Route::post('/update/{id}', 'update')->name('admin-project.update');
    Route::post('/', 'store')->name('admin-project.strore');
    Route::delete('/{id}', 'destroy')->name('admin-project.destroy');
});

Route::controller(AdminCodeController::class)->prefix('/admin/code')->group(function () {
    Route::get('/', 'index')->name('admin-code.index');
    Route::get('/create', 'create')->name('admin-code.create');
    Route::post('/update/{id}', 'update')->name('admin-code.update');
    Route::get('/edit/{id}', 'edit')->name('admin-code.edit');
    Route::get('/detail/{id}', 'show')->name('admin-code.detail');
    Route::patch('/{id}', 'update')->name('admin-code.update');
    Route::post('/', 'store')->name('admin-code.strore');
    Route::delete('/{id}', 'destroy')->name('admin-code.destroy');
});

Route::controller(AdminAboutController::class)->prefix('/admin/about')->group(function () {
    Route::get('/', 'index')->name('admin-about.index');
    Route::get('/create', 'create')->name('admin-about.create');
    Route::get('/edit', 'edit')->name('admin-about.edit');
    Route::get('/detail/{id}', 'detail')->name('admin-about.detail');
    Route::patch('/{id}', 'update')->name('admin-about.update');
    Route::post('/', 'store')->name('admin-about.strore');
    Route::delete('/{id}', 'destroy')->name('admin-about.destroy');
});

Route::controller(AdminTaskController::class)->prefix('/admin/task')->group(function () {
    Route::get('/', 'index')->name('admin-task.index');
    Route::get('/create', 'create')->name('admin-task.create');
    Route::get('/edit/{id}', 'edit')->name('admin-task.edit');
    Route::get('/detail/{id}', 'detail')->name('admin-task.detail');
    Route::patch('/{id}', 'update')->name('admin-task.update');
    Route::post('/', 'store')->name('admin-task.strore');
    Route::delete('/{id}', 'destroy')->name('admin-task.destroy');
});

Route::controller(AdminSettingController::class)->prefix('/admin/setting')->group(function () {
    Route::get('/', 'index')->name('admin-setting.index');
    Route::get('/edit/{id}', 'edit')->name('admin-setting.edit');
    Route::get('/detail/{id}', 'detail')->name('admin-setting.detail');
    Route::patch('/{id}', 'update')->name('admin-setting.update');
    Route::post('/', 'store')->name('admin-setting.strore');
    Route::delete('/{id}', 'destroy')->name('admin-setting.destroy');
});
// });

/*
|--------------------------------------------------------------------------
| END ROUTE PAGE ADMIN 🟤
|--------------------------------------------------------------------------
*/
