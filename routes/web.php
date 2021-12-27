<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('FormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'formRegister'])->name('FormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::prefix("cart")->group(function (){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::get('add/{id}',[CartController::class,'add'])->name('add');
    Route::get('delete/{rowId}',[CartController::class,'delete'])->name('cart.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    });

    Route::prefix('shop')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/product/{id}', [ShopController::class, 'show'])->name('show');
    });


    Route::prefix('admin')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{id}/update', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/{id}/update', [ProductController::class, 'update'])->name('products.update');
            Route::get('/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
            Route::post('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/{id}/update', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('{id}/update', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
            Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('changePwd', [UserController::class, 'changePwd'])->name('users.change');
            Route::post('pwdStore', [UserController::class, 'pwdStore'])->name('users.pwdStore');
        });
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});


