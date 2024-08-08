<?php

use App\Http\Controllers\Web\auth\LoginController;
use App\Http\Controllers\Web\auth\RegisterController;
use App\Http\Controllers\Web\backend\DashBoardController;
use App\Http\Controllers\Web\backend\ProductController;
use App\Http\Controllers\Web\backend\UserController;
use App\Http\Controllers\Web\frontend\ProductController as FrontendProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\backend\OrderController;
use App\Http\Controllers\Web\frontend\CartController;
use App\Http\Controllers\Web\frontend\IndexController;
use Illuminate\Support\Facades\Route;

// Admin routes
Route::prefix("admin")->name("admin.")->group(function () {
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
})->middleware(['auth', 'role:admin']);

Route::prefix("customer")->name("customer.")->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');

})->middleware(['auth', 'role:customer']);


Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/products', [IndexController::class, 'products'])->name('products');
Route::prefix('/products')->group(function () {
    Route::get('/{id}', [FrontendProductController::class,'infoProduct'])->name('products.info');
});

Route::get('/about',[IndexController::class,'about'])->name('about');

Route::get('/cart',[IndexController::class,'cart'])->name('cart');
Route::post('/cart/add',[FrontendProductController::class, 'addProductToCart'])->name('cart.add');

Route::get('/contact',[IndexController::class,'contact'])->name('contact');
Route::get('/check-out',[IndexController::class,'checkOut'])->name('checkout');
Route::get('/blog',[IndexController::class,'blog'])->name('blog');
    

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'getLogout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register' ,[RegisterController::class, 'postRegister']);





