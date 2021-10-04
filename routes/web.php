<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SeparatorController;
use App\Http\Controllers\MainPageController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [MainPageController::class,'index'])->name('welcome');
Route::get('/admin',[AdminController::class,'index'])->name('root');
Route::get('/create-page',[AdminController::class,'show_create_page'])->name('show_create_page');
Route::post('/create',[AdminController::class,'store'])->name('store_new');
Route::get('/show/{id}',[AdminController::class,'show'])->name('show');
Route::post('/update',[AdminController::class,'update'])->name('update');
Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('delete');
Route::post('/image-check',[AdminController::class,'imageCheck'])->name('image-check');
Route::post('/link-check',[AdminController::class,'linkCheck'])->name('link-check');
Route::get('/sliders',[SlidersController::class,'index'])->name('sliders');
Route::post('/update-slide',[SlidersController::class,'update'])->name('update-slide');
Route::post('/update-speed',[SlidersController::class,'updateSpeed'])->name('update-speed');
Route::post('/update-label',[SlidersController::class,'updateLabel'])->name('update-label');
Route::get('/separator',[SeparatorController::class,'index'])->name('separator');
Route::post('/separator-update',[SeparatorController::class,'update'])->name('separator-update');
