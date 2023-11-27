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
use App\Http\Controllers\CourseandEventController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

//admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::resource('courses', CourseController::class);
    Route::resource('events', EventController::class);
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::resource('message', MessageController::class);

//guest
Route::resource('checkout', CheckoutController::class);
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/courses', [CourseandEventController::class, 'courses'])->name('courses');
Route::get('/courses/register/{id}', [CourseandEventController::class, 'courses_registration'])->name('courses.register');
Route::post('/courses/store', [CourseandEventController::class, 'courses_store'])->name('courses.store');
Route::get('/events', [CourseandEventController::class, 'events'])->name('events');
Route::get('/events/register/{id}', [CourseandEventController::class, 'events_registration'])->name('events.register');
Route::post('/events/store', [CourseandEventController::class, 'events_store'])->name('events.store');


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
