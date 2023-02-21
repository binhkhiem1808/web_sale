<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProductController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Product;

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







// User
Route::get('/index', [UserProductController::class, 'main']);

// Product

Route::get('user/product/index', [UserProductController::class, 'index']);
Route::middleware('must-auth')->group(function(){
    // Admin
    Route::group(['prefix' => '/admin', 'middleware' => 'must-admin'], function(){
        
        Route::get('/login', [AdminController::class, 'loginAdmin']);
        
        Route::post('/login', [AdminController::class, 'login']);
        // Categories
        Route::group(['prefix' => '/categories'], function(){
            Route::get('/index', [CategoryController::class, 'index']);
        
            Route::get('/create', [CategoryController::class, 'showCreate']);
        
            Route::post('/create', [CategoryController::class, 'create']);
        
            Route::get('/{id}/edit', [CategoryController::class, 'edit']);
        
            Route::put('/{id}', [CategoryController::class, 'update']);
        
            Route::delete('/{id}', [CategoryController::class, 'delete']);
        
        });
    
        // Product
        Route::group(['prefix' => '/product'], function(){
            Route::get('/index', [AdminProductController::class, 'index']);
    
            Route::get('/create', [AdminProductController::class, 'showCreate']);
    
            Route::post('/create', [AdminProductController::class, 'store']);
    
            Route::get('/{id}/edit', [AdminProductController::class, 'edit']);
    
            Route::put('/{id}', [AdminProductController::class, 'update']);
    
            Route::delete('/{id}', [AdminProductController::class, 'delete']);
        });
    
    
    
    
    });
    Route::group(['prefix' => '/user'],function() {

        // Search 

        Route::get('/search', function(){
            // $key = InputInput::get('key');
            $data = Product::orderBy('created_at', 'DESC')->paginate(4);
            if($key = request()->key){
                $data = Product::orderBy('created_at', 'DESC')->where('name', 'like', '%'.$key.'%')->paginate(4);     
            } 
            return view('user.product.search', compact('data'));
        });

        // Cart
        
        Route::get('/cart', [CartController::class, 'cart']);

        Route::post('/add-cart', [CartController::class, 'addCart']);

        Route::post('/update-cart', [CartController::class, 'updateCart']);
        
        Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart']);
        

        // Checkout
        Route::post('/cart', [CartController::class, 'buyProducts']);
        // Product
    
    
        Route::get('/product/{id}/watch', [UserProductController::class, 'watch']);
    
        Route::get('product/{id}/watch/{ID}/detail', [UserProductController::class, 'detail']);
    
    
    
    });
    Route::get('/profile', function(){
        return view('layouts.pages.profile');
    });
});

// Auth

Route::get('/login', [AuthController::class, 'showLogin']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);



