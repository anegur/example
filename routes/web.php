<?php

use App\Http\Controllers\GuestBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GGmoney_Ja;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\GBUploaderController;
use App\Http\Controllers\Admin\BlogEditorController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\BlogUploaderController;
use App\Http\Controllers\Admin\VisitStatisticsController;
use App\Http\Controllers\LoginController;

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Маршруты для аутентификации
Route::get('/auth_form', [LoginController::class, 'showLoginForm'])->name('authForm');
Route::post('/auth_form/login', [LoginController::class, 'loginConfirm'])->name('loginConfirm');
Route::post('/auth_form/register', [LoginController::class, 'registerConfirm'])->name('registerConfirm');

// Группировка пользовательских маршрутов с middleware 'user'
Route::group(['middleware' => 'user'], function() {

    Route::get('/index', [GGmoney_Ja::class, 'index'])->name('index');
    
    // Информационные страницы
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    
    Route::get('/education', function () {
        return view('education');
    })->name('education');
    
    Route::get('/history', function () {
        return view('history');
    })->name('history');
    
    // Фотогалерея и интересы
    Route::get('/interests', [InterestsController::class, 'showInterests'])->name('interests');
    Route::get('/photo_album', [PhotoController::class, 'showPhotoAlbum'])->name('photo_album');
    
    // Тест и контактные формы
    Route::get('/test', [TestController::class, 'ShowTest'])->name('test');
    Route::post('/test', [TestController::class, 'ValidateForm'])->name('test.ValidateForm');
    
    Route::get('/contact', [ContactController::class, 'ShowContact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'ValidateForm'])->name('contact.ValidateForm');
    
    // Гостевая книга
    Route::get('/guest_book', [GuestBookController::class, 'index'])->name('guest_book');
    Route::post('/guest_book/store', [GuestBookController::class, 'store'])->name('guest_book.store');
    
    // Блог
    Route::get('/my_blog', [MyBlogController::class, 'index'])->name('my_blog');
    
    // Загрузка блога
    Route::get('/blog_uploader', [BlogUploaderController::class, 'index'])->name('blog_uploader');
    Route::post('/blog_uploader/upload', [BlogUploaderController::class, 'upload'])->name('blog_uploader.upload');
    
    // Административная панель с middleware 'role'
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'role'], function () {
        Route::get('/gb_uploader', [GBUploaderController::class, 'index'])->name('gb_uploader');
        Route::post('/gb_uploader/upload', [GBUploaderController::class, 'upload'])->name('gb_uploader.upload');
    
        Route::get('/blog_editor', [BlogEditorController::class, 'index'])->name('blog_editor');
        Route::post('/blog_editor/store', [BlogEditorController::class, 'store'])->name('blog_editor.store');
    
        Route::get('/visit_stat', [VisitStatisticsController::class, 'index'])->name('visit_stat');
    });
});
