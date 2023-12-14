<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourseandEventController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\FindSubcategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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
    'middleware' => ['auth', 'admin']
], function () {
    Route::resource('orders', OrderController::class);

    //courses&events
    Route::resource('courses', CourseController::class);
    Route::resource('events', EventController::class);
    Route::get('/course/registrations/{id}', [CourseandEventController::class, 'course_registrations'])->name('course.registrations');
    Route::get('/event/registrations/{id}', [CourseandEventController::class, 'event_registrations'])->name('event.registrations');

    //shop
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/findsubcategories/{id}', [FindSubcategoriesController::class, 'findsubcategories'])->name('findsubcategories');

    //gallery
    Route::get('/gallery', [GalleryController::class, 'view'])->name('gallery');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/destroy/{image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    //storage
    Route::get('/storage', [StorageController::class, 'view'])->name('storage.view');
    Route::get('/storage/deposit/{id}', [StorageController::class, 'deposit'])->name('storage.deposit');
    Route::get('/storage/collect/{id}', [StorageController::class, 'collect'])->name('storage.collect');
    Route::patch('/storage/deposit/{id}', [StorageController::class, 'deposit_store'])->name('storage.deposit.update');
    Route::patch('/storage/collect/{id}', [StorageController::class, 'collect_store'])->name('storage.collect.update');

    //messages
    Route::get('/messages', [MessagesController::class, 'messages'])->name('messages');
});

//messages
Route::post('/message/store', [MessagesController::class, 'store'])->name('message.store');


//guest
Route::resource('checkout', CheckoutController::class);
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [ShopController::class, 'subcategory'])->name('subcategory');
Route::get('/shop/accessories/{id}', [ShopController::class, 'accessories'])->name('accessories');
Route::get('/shop/manufacturer/accessories/{id}', [ShopController::class, 'accessoriesbymanufacturer'])->name('accessoriesbymanufacturer');
Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/search/{q}', [ShopController::class, 'search_result'])->name('search.result');


//gallery
Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');

//storage
Route::get('/storage', [StorageController::class, 'storage'])->name('storage');
Route::post('/storage/store', [StorageController::class, 'storage_store'])->name('storage.store');
//confirmation
Route::get('/storage/confirmation', function () {
    return view('guest.storage.confirmation');
})->name('storage.confirm');


//courses
Route::get('/courses', [CourseandEventController::class, 'courses'])->name('courses');
Route::get('/courses/register/individual/{id}', [CourseandEventController::class, 'courses_registration_individual'])->name('courses.register.individual');
Route::get('/courses/register/group/{id}', [CourseandEventController::class, 'courses_registration_group'])->name('courses.register.group');
Route::post('/courses/store/individual', [CourseandEventController::class, 'courses_store_individual'])->name('courses.store.individual');
Route::post('/courses/store/group', [CourseandEventController::class, 'courses_store_group'])->name('courses.store.group');
//confirmation
Route::get('/course/registration/confirmation', function () {
    return view('guest.courses.confirmation');
})->name('courses.confirm');

//events
Route::get('/events', [CourseandEventController::class, 'events'])->name('events');
Route::get('/events/register/individual/{id}', [CourseandEventController::class, 'events_registration_individual'])->name('events.register.individual');
Route::get('/events/register/group/{id}', [CourseandEventController::class, 'events_registration_group'])->name('events.register.group');
Route::post('/events/store/individual', [CourseandEventController::class, 'events_store_individual'])->name('events.store.individual');
Route::post('/events/store/group', [CourseandEventController::class, 'events_store_group'])->name('events.store.group');
//confirmation
Route::get('/event/registration/confirmation', function () {
    return view('guest.events.confirmation');
})->name('events.confirm');

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
