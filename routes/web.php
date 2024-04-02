<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to theart "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->middleware('minifier')->name('page.index');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('page.about');
Route::get('/payment-success', [App\Http\Controllers\PageController::class, 'paysuccess'])->name('page.paysuccess');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('page.contact');
Route::get('/shop', [App\Http\Controllers\PageController::class, 'shop'])->middleware('minifier')->name('page.shop');
// Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->name('page.cart');
Route::get('/checkout', [App\Http\Controllers\PageController::class, 'checkout'])->name('page.checkout');
// Route::get('/newinformation/{newinformation}', [App\Http\Controllers\PageController::class, 'newinformation'])->name('pages.newinformation');
Route::get('/newinformation/{newinformation}', [App\Http\Controllers\PageController::class, 'newinformation'])->name('pages.newinformation');

// --- Cart -----
Route::group([
    'middleware' => 'auth'
], function(){
    Route::get('/carts', [App\Http\Controllers\CartController::class, 'index'])->name('carts.index');
   
    Route::post('/carts/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{cart}', [App\Http\Controllers\CartController::class, 'destory'])->name('carts.destory');
    Route::put('/carts/{cart}', [App\Http\Controllers\CartController::class, 'updateQty'])->name('carts.updateQty');

    Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/session', [App\Http\Controllers\OrderController::class, 'session'])->name('orders.session');
    Route::get('/orders/success', [App\Http\Controllers\OrderController::class, 'success'])->name('success');
    Route::get('/orders/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])->name('cancel');
});


Auth::routes();


Route::group([
    'prefix' => 'backends',
    'middleware' => ['auth']
], function(){
     
    Route::get('/', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->name('backends.dashboard');
    Route::get('/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('users.index');
    
    Route::group([
        'middleware' => ['backends']
    ], function(){
        Route::get('/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'destroy'])->name('users.destroy');
    });

    
    Route::group([
        'prefix' => 'categories'
    ], function(){
        Route::get('/', [App\Http\Controllers\Backends\CategoryController::class, 'index'])->name('backends.categories.index');
        Route::get('/create', [App\Http\Controllers\Backends\CategoryController::class, 'create'])->name('backends.categories.create');
        Route::post('/store', [App\Http\Controllers\Backends\CategoryController::class, 'store'])->name('backends.categories.store');
        Route::get('/{category}/edit', [App\Http\Controllers\Backends\CategoryController::class, 'edit'])->name('backends.categories.edit');
        Route::put('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'update'])->name('backends.categories.update');
        Route::delete('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'destroy'])->name('backends.categories.delete');
    });

   Route::resource('products', App\Http\Controllers\Backends\ProductController::class, [
    'as' => 'backends' 
   ]);

   Route::resource('advertisement', App\Http\Controllers\Backends\AdvertisementController::class ,[
    'as' => 'backends'
   ]);

   Route::group([
     'prefix' => 'contact'
   ], function(){
       Route::get('/', [App\Http\Controllers\Backends\ContactController::class, 'index'])->name('backends.contact.index');
       Route::post('/store', [App\Http\Controllers\Backends\ContactController::class, 'store'])->name('backends.contact.store');
       Route::get('/contact/{contact}', [App\Http\Controllers\Backends\ContactController::class, 'show'])->name('backends.contact.show');
       Route::delete('/{contact}', [App\Http\Controllers\Backends\ContactController::class, 'destroy'])->name('backends.contact.destroy');
       
   });

   Route::resource('newinformation', App\Http\Controllers\Backends\NewInformationController::class, [
    'as' => 'backends'
   ]);

   Route::resource('about', App\Http\Controllers\Backends\AboutController::class,[
    'as' => 'backends'
   ]);

   
  

   
});

