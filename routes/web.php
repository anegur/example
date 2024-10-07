<?php

use App\Http\Controllers\GuestBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GGmoney_Ja;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\GBUploaderController;
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
    return view('welcome');
});

Route::get('/index', function () {
    //return view('index');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/interests', [InterestsController::class, 'showInterests'])->name('interests');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/photo_album', [PhotoController::class, 'showPhotoAlbum'])->name('photo_album');

Route::get('/test', [TestController::class, 'ShowTest'])->name('test');
Route::post('/test', [TestController::class, 'ValidateForm'])->name('test.ValidateForm');

Route::get('/contact', [ContactController::class, 'ShowContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'ValidateForm'])->name('contact.ValidateForm');

Route::get('/guest_book', [GuestBookController::class, 'index'])->name('guest_book');
Route::post('/guest_book/store', [GuestBookController::class, 'store'])->name('guest_book.store');

Route::get('/admin/gb_uploader', [GBUploaderController::class, 'index'])->name('gb_uploader');
Route::post('/admin/gb_uploader/upload', [GBUploaderController::class, 'upload'])->name('gb_uploader.upload');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/index', [GGmoney_Ja::class,'index'])->name('index');

Route::post('/index', [GGmoney_Ja::class,'index']);