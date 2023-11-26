<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegistrationController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('orders', OrderController::class);
});


Route::resource('courses', CourseController::class)->middleware('auth');
Route::resource('events', EventController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('message', MessageController::class);

//guest
Route::resource('checkout', CheckoutController::class);
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::post('/search', [ShopController::class, 'search'])->name('search');

//registration courses/events
Route::get('/courses', [RegistrationController::class, 'courses'])->name('courses');

//cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('cart.store');
Route::patch('/updateCart/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/removeFromcart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');

//order confirmation
Route::get('/order-confirmation', function () {
    return view('guest.shop.confirmation');
})->name('confirmation');

require __DIR__ . '/auth.php';
