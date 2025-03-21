<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductlikesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/carts',[ CartsController::class,'index',]);
Route::get('/carts/create',[ CartsController::class,'create',]);
Route::post('/carts', [CartsController::class, 'store']);
Route::get('/carts/{cart}/edit',[ CartsController::class,'edit',]);
Route::put('/carts/{cart}',[ CartsController::class,'update',]);
Route::delete('/carts/{cart}',[ CartsController::class,'destroy']);


Route::get('/customers',[ CustomersController::class,'index',]);
Route::get('/customers/create',[ CustomersController::class,'create',]);
Route::post('/customers', [CustomersController::class, 'store']);
Route::get('/customers/{customer}/edit',[ CustomersController::class,'edit',]);
Route::put('/customers/{customer}',[ CustomersController::class,'update',]);
Route::delete('/customers/{customer}',[ CustomersController::class,'destroy']);

Route::get('/categories',[ CategoriesController::class,'index',]);
Route::get('categories/create',[ CategoriesController::class,'create',]);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{category}/edit',[ CategoriesController::class,'edit',]);
Route::put('/categories/{category}',[ CategoriesController::class,'update',]);
Route::delete('/categories/{category}',[ CategoriesController::class,'destroy']);

Route::get('/products',[ ProductsController::class,'index',]);
Route::get('/products/create',[ ProductsController::class,'create',]);
Route::post('/products', [ProductsController::class, 'store']);
Route::get('/products/{product}/edit',[ ProductsController::class,'edit',]);
Route::put('/products/{product}',[ ProductsController::class,'update',]);
Route::delete('/products/{product}',[ ProductsController::class,'destroy']);


Route::get('/productlikes',[ ProductlikesController::class,'index',]);
Route::get('/productlikes/create',[ ProductlikesController::class,'create',]);
Route::post('/productlikes', [ProductlikesController::class, 'store']);
Route::get('/productlikes/{productlike}/edit',[ ProductlikesController::class,'edit',]);
Route::put('/productlikes/{productlike}',[ ProductlikesController::class,'update',]);
Route::delete('/productlikes/{productlike}',[ ProductlikesController::class,'destroy']);


Route::get('/settings',[ SettingController::class,'index',]);
Route::get('/settings/create',[ SettingController::class,'create',]);

Route::post('/settings', [SettingController::class, 'store']);

Route::get('/settings/{setting}/edit',[ SettingController::class,'edit',]);
Route::put('/settings/{setting}',[ SettingController::class,'update',]);
Route::delete('/settings/{setting}',[ SettingController::class,'destroy']);
