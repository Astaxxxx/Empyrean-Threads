<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\basketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrderForProductController;
use App\Http\Controllers\ColourForProductController;
use App\Http\Controllers\CategoryForProductController;
use App\Http\Controllers\CheckoutForProductController;
use App\Http\Controllers\WishlistForProductController;

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

Route::get('/sucess', [PagesController::class,'success'])->name('success');

Route::get('/', [PagesController::class,'home'])->name('home');
Route::get('basket', [PagesController::class,'basket'])->name('basket');
Route::get('/wishlist', [PagesController::class,'wishlist'])->name('wishlist');
Route::get('/accountPage', [PagesController::class,'accountPage'])->name('accountPage')->middleware('auth');
Route::get('/checkout', [PagesController::class,'checkout'])->name('checkout')->middleware('auth');
Route::get('/products/{id}', [PagesController::class,'product'])->name('product');
Route::get('/aboutUs', [PagesController::class,'aboutUs'])->name('aboutUs');
Route::get('/productPage', [PagesController::class,'productPage'])->name('productPage');
Route::get('/orderHistory', [PagesController::class,'orderHistory'])->name('orderHistory');
Route::get('/contactUs', [PagesController::class,'contactUs'])->name('contactUs');

Route::post('/stripe-checkout', [CheckoutForProductController::class,'stripeCheckout'])->name('stripeCheckout')->middleware('auth');

Route::post('/adding-a-wishlist/{id}', [WishlistForProductController::class,'posting'])->name('addingWishlist')->middleware('auth');
Route::post('/removing-a-wishlist/{id}', [WishlistForProductController::class,'removing'])->name('removingWishlist')->middleware('auth');

Route::post('/add-to-basket/{id}', [basketController::class,'addTobasket'])->name('addTobasket');
Route::post('/remove-from-basket/{id}', [basketController::class,'removeFrombasket'])->name('removeFrombasket');


Route::get('/login', [AuthenticationController::class, 'newLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthenticationController::class, 'newRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthenticationController::class, 'postForRegister'])->name('register')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'postForLogin'])->name('login')->middleware('guest');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth');


Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'adminHomepage'])->name('adminpanel');


    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [CategoryForProductController::class, 'mainPage'])->name('adminpanel.catergories');
        Route::post('/', [CategoryForProductController::class, 'store'])->name('adminpanel.category.store');
        Route::delete('/{id}', [CategoryForProductController::class, 'destroy'])->name('adminpanel.category.destroy');
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', [ProductController::class, 'mainPage'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy');
    });

    Route::group(['prefix' => 'orders'], function() {
        Route::get('/', [OrderForProductController::class, 'index'])->name('adminpanel.orders');
        Route::get('/{id}', [OrderForProductController::class, 'view'])->name('adminpanel.orders.view');
    });

    Route::group(['prefix' => 'colours'], function() {
        Route::get('/', [ColourForProductController::class, 'makeColour'])->name('adminpanel.colour');
        Route::post('/', [ColourForProductController::class, 'storeColour'])->name('adminpanel.colour.store');
        Route::delete('/{id}', [ColourForProductController::class, 'destroy'])->name('adminpanel.colour.destroy');
    });

});



