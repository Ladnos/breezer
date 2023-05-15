<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\fileuploadcontroller;

use Illuminate\Support\Facades\Route;

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
Route::prefix('/admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.form');
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'dash'])->middleware('admin')->name('admin.dashboard');
    Route::get('/{id}/{fileNmae}',[AdminController::class,'download'])->middleware('admin');
    Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::put('/dashboard',[fileuploadcontroller::class, 'fileUpload'])->name('file.upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
