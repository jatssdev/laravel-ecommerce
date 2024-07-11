<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\userController;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $products = products::all();
    return view('welcome', compact('products'));
})->name('user.home');
Route::get('/cart', [cartController::class, 'index'])->name('user.cart');

Route::get('/register', function () {
    return view('register');
})->name('user.register');

Route::get('/login', function () {
    return view('login');
})->name('user.login');

Route::post('/register', [userController::class, 'add'])->name('user.adduser');
Route::post('/login', [userController::class, 'login'])->name('user.login');
Route::get('/logout', [userController::class, 'logout'])->name('user.logout');
Route::post('/cart/add', [cartController::class, 'add'])->name('user.cart.add');

// Grouping admin routes without middleware
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin');


    Route::get('/products', function () {
        $products = products::all();

        return view('admin.products', compact('products'));
    })->name('admin.products');
    Route::get('/users', function () {
        $users = User::all();

        return view('admin.users', compact('users'));
    })->name('admin.users');


    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::get('/addproduct', function () {
        return view('admin.addproduct');
    })->name('admin.addproduct');

    Route::post('/store/products', [productsController::class, 'storeall'])->name('admin.product.storeall');
    Route::post('/store/product', [productsController::class, 'store'])->name('admin.product.store');

    Route::post('/login', [adminController::class, 'login'])->name('admin.login');

    Route::post('/logout', [adminController::class, 'logout'])->name('admin.logout');
});
