<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('admin/users/login',[LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {
    
    
    Route::prefix('admin')->group(function()
    {

    
        Route::get('/',[MainController::class, 'index'])->name('admin');
        Route::get('main',[MainController::class, 'index'])->name('admin');

        #group menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class, 'create']);
            Route::post('add',[MenuController::class, 'store']);
            Route::get('list',[MenuController::class, 'index']);
            Route::get('edit/{menu}',[MenuController::class, 'show'])->name('edit');
            Route::post('edit/{menu}',[MenuController::class, 'update']);
            Route::DELETE('destroy',[MenuController::class, 'destroy']);
        });

        #product 
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class, 'create']);
            Route::post('add',[ProductController::class, 'store']);
            Route::get('list',[ProductController::class, 'index']);
            Route::get('edit/{product}',[ProductController::class, 'show'])->name('edit');
            Route::post('edit/{product}',[ProductController::class, 'update']);
            Route::DELETE('destroy',[ProductController::class, 'destroy']);
        });

         #slide 
         Route::prefix('Slider')->group(function(){
            Route::get('add',[SliderController::class, 'create']);
            Route::post('add',[SliderController::class, 'store']);
            Route::get('list',[SliderController::class, 'index']);
            Route::get('edit/{Slider}',[SliderController::class, 'show']);
            Route::put('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy',[SliderController::class, 'destroy']);
         });

        #upload
        Route::post('upload/services',[UploadController::class,'store']);

        #cart
        Route::get('customers',[CartController::class,'index']);
        Route::get('customers/view/{customer}',[CartController::class,'show']);

    });

});


Route::get('/',[App\Http\Controllers\MainController::class ,'index']);
Route::post('/services/load-product',[App\Http\Controllers\MainController::class,'loadProduct']);


Route::get('danh-muc/{id}-{slug}.html',[App\Http\Controllers\MenuController::class,'index']);
Route::get('san-pham/{id}-{slug}.html',[App\Http\Controllers\ProductController::class,'index']);

Route::post('add-cart',[App\Http\Controllers\CartController::class,'index']);
Route::get('carts',[App\Http\Controllers\CartController::class,'show']);
Route::get('contact',[App\Http\Controllers\ContactController::class,'index']);
Route::post('update-cart',[App\Http\Controllers\CartController::class,'update']);
Route::get('carts/delete/{id}',[App\Http\Controllers\CartController::class,'remove']);
Route::post('carts',[App\Http\Controllers\CartController::class,'addcart']);
Route::get('/cart-count', function () {
    $count = count(Session::get('carts', []));
    return response()->json(['count' => $count]);
});
Route::get('search',[App\Http\Controllers\ProductController::class,'search'])->name('search');







