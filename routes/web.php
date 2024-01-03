<?php

use App\Http\Controllers\DevController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('app');
})->name('application');
Route::post('/student-save', [StudentController::class, 'studentSave'])->name('student.info.save');
Route::get('/student-show', [StudentController::class, 'studentShow'])->name('student.show');
Route::get('/student-edit/{id}', [StudentController::class, 'studentEdit'])->name('student.edit');
Route::post('/student-update/{id}', [StudentController::class, 'studentUpdate'])->name('student.update');

//
Route::get('/product-show', [ProductController::class, 'productShow'])->name('product.show');
Route::post('/product-create', [ProductController::class, 'productCreate'])->name('product.create');
Route::get('/product-delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');

// user
Route::get('/user-show', [UserController::class, 'userShow'])->name('user.show');
Route::post('/user-create', [UserController::class, 'userCreate'])->name('user.create');
Route::get('/user-edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
Route::post('/user-update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
Route::get('/user-delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');

Route::get('/dev-show', [DevController::class, 'devShow'])->name('dev.show');
Route::post('/dev-create', [DevController::class, 'devCreate'])->name('dev.create');
Route::get('/dev_edit/{id}', [DevController::class, 'devEdit'])->name('dev.edit');
Route::post('/dev_update/{id}', [DevController::class, 'devUpdate'])->name('dev.update');
Route::get('/dev-delete/{id}', [DevController::class, 'devDelete'])->name('dev.delete');
