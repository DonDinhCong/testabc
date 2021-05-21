<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about-us', 'about-us')->name('about-us');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');
Route::view('/contact', 'contact')->name('contact');
Route::get('/product_detail/{id}', [DetailController::class, 'index'])->name('product_detail');

Route::middleware('authadmin')->group(function () {

    Route::prefix('/admin')->group(function (){

        //users
        Route::name('users.')->group(function (){
            Route::get('/users', [UsersController::class, 'index'])->name('index');
            Route::prefix('/users')->group(function (){
                Route::get('/create', [UsersController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
                Route::get('/show/{id}', [UsersController::class, 'show'])->name('show');
                Route::post('/store', [UsersController::class, 'store'])->name('store');
                Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
                Route::post('/destroy/{id}', [UsersController::class, 'destroy'])->name('destroy');
            });
        });

        //brands
        Route::name('brands.')->group(function (){
            Route::get('/brands', [BrandsController::class, 'index'])->name('index');
            Route::prefix('/brands')->group(function (){
                Route::get('/create', [BrandsController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('edit');
                Route::post('/store', [BrandsController::class, 'store'])->name('store');
                Route::post('/update/{id}', [BrandsController::class, 'update'])->name('update');
                Route::post('/destroy/{id}', [BrandsController::class, 'destroy'])->name('destroy');
            });
        });

        //cates
        Route::name('cates.')->group(function (){
            Route::get('/cates', [CategoriesController::class, 'index'])->name('index');
            Route::prefix('/cates')->group(function (){
                Route::get('/create', [CategoriesController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
                Route::post('/store', [CategoriesController::class, 'store'])->name('store');
                Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('update');
                Route::post('/updateStatus/{id}', [CategoriesController::class, 'updateStatus'])->name('updateStatus');
                Route::post('/destroy/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
            });
        });

        //products
        Route::name('products.')->group(function (){
            Route::get('/products', [ProductsController::class, 'index'])->name('index');
            Route::prefix('/products')->group(function (){
                Route::get('/create', [ProductsController::class, 'create'])->name('create');
                Route::get('/cateAndGallery/{product_id}', [ProductsController::class, 'cateAndGallery'])->name('cateAndGallery');
                Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
                Route::get('/show/{id}', [ProductsController::class, 'show'])->name('show');
                Route::post('/store', [ProductsController::class, 'store'])->name('store');
                Route::post('/addImage', [ProductsController::class, 'addImage'])->name('addImage');
                Route::post('/chooseCate', [ProductsController::class, 'chooseCate'])->name('chooseCate');
                Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');
                Route::post('/destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy');
                Route::post('/destroyImage/{id}', [ProductsController::class, 'destroyImage'])->name('destroyImage');
            });
        });

    }); 
});
