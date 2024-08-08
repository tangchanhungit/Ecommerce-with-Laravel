<?php


use App\Http\Controllers\Web\backend\DashBoardController;
use App\Http\Controllers\Web\backend\ProductController;
use App\Http\Controllers\Web\backend\UserController;
use App\Http\Controllers\Web\backend\OrderController;
use App\Http\Controllers\Web\auth\AuthController;
use App\Http\Controllers\Web\frontend\IndexController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::prefix("admin")->name("admin.")->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('home');
    
    Route::prefix('/users')->name("users.")->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list','index')->name('list');
            Route::get('/add-user','showCreateForm')->name('add');
            Route::post('/add-user','create')->name('create');
            Route::get('/info/{id}','show')->name('info');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    Route::prefix('/products')->name("products.")->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/list','index')->name('list');
            Route::get('/add-product','showCreateForm')->name('add');
            Route::post('/add-product', 'create')->name('create');
            Route::get('/info/{id}','show')->name('info');
            Route::get('/delete/{id}','destroy')->name('delete');
        });
    });

    Route::prefix('/orders')->name("orders.")->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders-list','index')->name('list');
            Route::get('/create-order','showCreateForm')->name('create');
            Route::post('/create-order','create')->name('post');
            Route::get('/info/{id}','showOrderDetails')->name('info');
        });
    });
});

Route::prefix("customer")->name("customer.")->group(function () {

})->middleware(['auth','role:customer']);

Route::prefix('/')->group(function () {
    Route::controller(IndexController::class)->group(function () {
        Route::get('/','index')->name('home');
        
        Route::get('/products','products')->name('products');
        Route::get('/products/{id}','infoProduct')->name('products.info');

        Route::get('/contact','contact')->name('contact');
        Route::get('/check-out','checkOut')->name('checkout');
        Route::get('/blog','blog')->name('blog');
        Route::get('/about','about')->name('about');
        Route::get('/cart','cart')->name('cart');

    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login','showLoginForm')->name('login.form');
    Route::post('/login','login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

    Route::post('/check-email','checkEmail')->name('check.email');

    Route::get('/password','showPasswordForm')->name('password.form');
    
    Route::get('/register','showRegisterForm')->name('register.form');
    Route::post('/register','register')->name('register');
    Route::get('/resend-code','resendCode')->name('resend.code');
});








