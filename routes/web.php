<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;

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


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('login', [AuthController::class, 'loginView'])->name('login-view');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register-view', [AuthController::class, 'registerFrontend'])->name('registerView');
Route::post('register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('create-blog', [BlogController::class, 'createBlog'])->name('createBlog');
    Route::post('storeBlog', [BlogController::class, 'store'])->name('storeBlog');
    Route::get('details/{id}', [BlogController::class, 'show'])->name('productDetails');
    Route::get('my-blogs', [BlogController::class, 'userBlogs'])->name('userBlogs');
    Route::get('update-blog/{id}', [BlogController::class, 'updateBlog'])->name('updateBlog');
    Route::put('update/{id}', [BlogController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [BlogController::class, 'delete'])->name('deleteBlog');
    Route::get('my-profile', [HomeController::class, 'profile'])->name('myProfile');
    Route::post('update-profile', [HomeController::class, 'updateProfile'])->name('updateProfile');


});
