<?php

use App\Http\Controllers\Web\auth\LoginController;
use App\Http\Controllers\Web\auth\RegisterController;
use App\Http\Controllers\Web\backend\DashBoardController;
use App\Http\Controllers\Web\backend\ProductController;
use App\Http\Controllers\Web\backend\UserController;
use App\Http\Controllers\Web\frontend\ProductController as FrontendProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\backend\OrderController;
use App\Http\Controllers\Web\frontend\IndexController;
use Illuminate\Support\Facades\Route;

// Admin routes
Route::prefix("admin")->name("admin.")->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('home');
    
    Route::prefix('/users')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/add-user',[UserController::class,'showCreateForm'])->name('users.add');
        Route::post('/add-user',[UserController::class,'create'])->name('users.create');
        Route::get('/info/{id}', [UserController::class, 'show'])->name('users.info');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });

    Route::prefix('/products')->group(function () {
        Route::get('/list', [ProductController::class, 'index'])->name('products.list');
        Route::get('/add-product', [ProductController::class, 'showCreateForm'])->name('products.add');
        Route::post('/add-product', [ProductController::class, 'create'])->name('product.create');
        Route::get('/info/{id}', [ProductController::class, 'show'])->name('products.info');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    });

    Route::prefix('/orders')->group(function () {
        Route::get('/orders-list', [OrderController::class,'index'])->name('orders.list');
        Route::get('/create-order', [OrderController::class,'showCreateForm'])->name('orders.create');
        Route::post('/create-order', [OrderController::class,'create'])->name('orders.post');
        Route::get('/info/{id}', [OrderController::class,'showOrderDetails'])->name('orders.info');
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
Route::get('/contact',[IndexController::class,'contact'])->name('contact');
Route::get('/check-out',[IndexController::class,'checkOut'])->name('checkout');
Route::get('/blog',[IndexController::class,'blog'])->name('blog');
    

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'getLogout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register' ,[RegisterController::class, 'postRegister']);





