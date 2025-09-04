<?php

use App\Http\Controllers\Admin\CountryAdminController;
use App\Http\Controllers\Admin\DeliveryAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\QuestionAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\BalanceAdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/{product}/product', [MainController::class, 'product'])->name('product');
Route::post('/{product}/product', [MainController::class, 'product'])->name('product');
Route::middleware('auth')->post('/review', [MainController::class, 'review'])->name('review');
Route::middleware('auth')->post('/review-delete', [MainController::class, 'review_delete'])->name('review.delete');




Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile/edit',  'edit')->name('profile.edit');
    Route::patch('/profile/update',  'update')->name('profile.update');
    Route::get('/profile/cart',  'cart')->name('profile.cart');
    Route::post('/profile/cart',  'cart')->name('profile.cart');
    Route::post('/profile/order',  'order')->name('profile.order');
    Route::get('/profile/balance',  'balance')->name('profile.balance');
    Route::post('/profile/balance',  'balance_active')->name('profile.balance');
    Route::get('/profile/status',  'status')->name('profile.status');
    Route::get('/profile/referral',  'referral')->name('profile.referral');
    Route::get('/profile/support',  'support')->name('profile.support');
    Route::post('/profile/message',  'message')->name('profile.message');
});

Route::controller(RefController::class)->group(function () {
    Route::get('/{user}/referral',  'referral')->name('referral');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('product.')->controller(ProductAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{product}/edit', 'edit')->name('edit');
        Route::patch('/{product}/update', 'update')->name('update');
        Route::delete('{product}/delete', 'delete')->name('delete');
    });
    Route::prefix('orders')->name('order.')->controller(OrderAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{order}/delivery', 'delivery')->name('delivery');
    });
    Route::prefix('questions')->name('question.')->controller(QuestionAdminController::class)->group(function () {
        Route::get('/{product}', 'index')->name('index');
        Route::get('/{product}/create', 'create')->name('create');
        Route::post('/{product}/store', 'store')->name('store');
        Route::get('/{question}/edit', 'edit')->name('edit');
        Route::patch('/{question}/update', 'update')->name('update');
        Route::delete('{question}/delete', 'delete')->name('delete');
    });
    Route::prefix('reviews')->name('review.')->controller(ReviewAdminController::class)->group(function () {
        Route::get('/{product}', 'index')->name('index');
//        Route::get('/{product}/create', 'create')->name('create');
//        Route::post('/{product}/store', 'store')->name('store');
//        Route::get('/{question}/edit', 'edit')->name('edit');
//        Route::patch('/{question}/update', 'update')->name('update');
        Route::delete('{review}/delete', 'delete')->name('delete');
    });
    Route::prefix('country')->name('country.')->controller(CountryAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{country}/edit', 'edit')->name('edit');
        Route::patch('/{country}/update', 'update')->name('update');
        Route::delete('{country}/delete', 'delete')->name('delete');
    });
    Route::prefix('delivery')->name('delivery.')->controller(DeliveryAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{delivery}/edit', 'edit')->name('edit');
        Route::patch('/{delivery}/update', 'update')->name('update');
        Route::delete('{delivery}/delete', 'delete')->name('delete');
    });
    Route::prefix('balance')->name('balance.')->controller(BalanceAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{message}/{action}', 'action')->name('action');
    });

    Route::prefix('user')->name('user.')->controller(UserAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}/chat', 'chat')->name('chat');
        Route::post('/message', 'message')->name('message');
    });
});
require __DIR__.'/auth.php';
