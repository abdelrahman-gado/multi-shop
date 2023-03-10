<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;

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




// /admin/categories
Route::middleware(['auth', 'can:is_admin'])->prefix("/admin")->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('colors', ColorController::class);
});


// Shop
Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/detail', [DetailController::class, 'index']);
Route::post('/detail', [DetailController::class, 'postReview']);
Route::get('/cart', [CartController::class, 'index']);
Route::middleware(['auth'])->get('/checkout', [CheckoutController::class, 'index']);
Route::middleware(['auth'])->post('/checkout', [CheckoutController::class, 'createOrder']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'sendMessageViaEmail']);
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::get('/remove-product-from-wishlist', [WishlistController::class, 'removeProductFromWishList']);
Route::post('/newsletter', [HomeController::class, 'subscribeToNewsletter']);

Route::get('/add-product-to-cart', [CartController::class, 'addProductToCart']);
Route::get('/add-product-to-likedlist', [WishlistController::class, 'addProductToWishList']);


Route::get('/decrease-quantity', [CartController::class, 'decreaseProductQuantity']);
Route::get('/increase-quantity', [CartController::class, 'increaseProductQuantity']);
Route::get('/remove-product', [CartController::class, 'removeProductFromCart']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
