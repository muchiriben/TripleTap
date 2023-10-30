<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;
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
    return view('guest.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('course', CourseController::class)->middleware('auth');
Route::resource('event', EventController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('message', MessageController::class);

//guest
Route::resource('checkout', CheckoutController::class);
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('cart.store');
Route::patch('/updateCart/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/removeFromcart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');

require __DIR__ . '/auth.php';
