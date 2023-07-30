<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/hi', function () {
    return view('client.blocks.main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('categories', CategoryController::class);
Route::get('/upload-file', [UploadFileController::class, 'showform'])->name('upload-file');
Route::post('/upload-file', [UploadFileController::class, 'handleUpload'])->name('upload');
Route::resource('tags', TagController::class);
Route::get('user');
Route::resource('products', ProductController::class);

Route::get('ahhi', function (){
    return \App\Models\Category::all();
});
