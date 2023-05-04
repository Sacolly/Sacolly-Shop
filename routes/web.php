<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [ProductController::class, 'home'])->name('home_1');

// admin
    // Account
Route::get('account',[AccountController::class,'index'])->name('account.index');
Route::get('account/
',[AccountController::class,'create'])->name('account.create');
Route::post('account/create',[AccountController::class,'store'])->name('account.store');
Route::get('account/update/{id}',[AccountController::class,'edit'])->name('account.edit');
Route::post('account/update/{id}',[AccountController::class,'update'])->name('account.update');
Route::get('account/delete/{id}',[AccountController::class,'destroy'])->name('account.delete');
    // Categories
Route::get('categories',[CategoriesController::class,'index'])->name('categories.index');
Route::get('categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('categories/create',[CategoriesController::class,'store'])->name('categories.store');
Route::get('categories/update/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('categories/delete/{id}',[CategoriesController::class,'destroy'])->name('categories.delete');
    // Products
Route::get('products',[ProductController::class,'admin'])->name('products.index');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::post('products/create',[ProductController::class,'store'])->name('products.store');
Route::get('products/update/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('products.delete');
    // Detail
Route::get('details/index/{id}',[ProductDetailController::class,'index'])->name('details.index');
Route::get('details/create/{id}',[ProductDetailController::class,'create'])->name('details.create');
Route::post('details/create/{id}',[ProductDetailController::class,'store'])->name('details.store');
Route::get('details/update/{id}/{id_product}',[ProductDetailController::class,'edit'])->name('details.edit');
Route::post('details/update/{id}/{id_product}',[ProductDetailController::class,'update'])->name('details.update');
Route::get('details/delete/{id}',[ProductDetailController::class,'destroy'])->name('details.delete');
    // Images
Route::get('images/index/{id}',[ImagesController::class,'index'])->name('images.index');
Route::get('images/create/{id}',[ImagesController::class,'create'])->name('images.create');
Route::post('images/create/{id}',[ImagesController::class,'store'])->name('images.store');
Route::get('images/update/{id}/{id_product}',[ImagesController::class,'edit'])->name('images.edit');
Route::post('images/update/{id}/{id_product}',[ImagesController::class,'update'])->name('images.update');
Route::get('images/delete/{id}',[ImagesController::class,'destroy'])->name('images.delete');


// user
    // home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('turnover',[HomeController::class,'turnover'])->name('turnover');
Route::get('accept',[HomeController::class,'accept'])->name('accept');
Route::post('accept/{id}',[HomeController::class,'accept_success'])->name('accept_success');
    // product
Route::get('products_user',[ProductController::class,'index'])->name('products.user');
Route::get('products_show/{id}',[ProductController::class,'show'])->name('products.show');

    //Cart
Route::get('cart_user',[CartController::class,'index'])->name('cart.index');
Route::post('add_cart_user',[CartController::class,'store'])->name('cart.store');
Route::get('del_cart_user/{id}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('order_cart_user/{id}',[CartController::class,'order'])->name('cart.order');
        //payment
Route::post('payment/{id}',[CartController::class,'payment'])->name('payment');
    // Category
Route::get('category_product/{id}',[CategoriesController::class,'show'])->name('category.show');


    // My_Account
Route::view('account_user','user.my_account')->name('my_account.user');
    // wishlist
Route::view('wishlist_user','user.wishlist')->name('wishlist.user');
    // Contact
Route::view('contact_user','user.contact')->name('contact.user');



// Search
Route::post('search',[SearchController::class,'getSearch'])->name('search');