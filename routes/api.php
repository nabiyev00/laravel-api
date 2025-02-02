<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Models\UserPaymentCard;
use Illuminate\Support\Facades\Route;

/** AUTH  */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});

/** AUTH  */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'category.products' => CategoryProductController::class,
        'status.orders' => StatusOrderController::class,
        'products' => ProductController::class,
        'favorites' => FavoriteController::class,
        'orders' => OrderController::class,
        'delivery-methods' => DeliveryMethodController::class,
        'payment-types' => PaymentTypeController::class,
        'user-addresses' => UserAddressController::class,
        'payment-card-types' => PaymentCardTypeController::class,
        'user-payment-cards' => UserPaymentCard::class,
        'statuses' => StatusController::class,
        'reviews' => ReviewController::class,
        'product.reviews' => ProductReviewController::class,
    ]);
});
