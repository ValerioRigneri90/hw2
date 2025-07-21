<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsletterController;

/* uso get per mostrare il form di registrazione(Recuperare e visualizzare dati) e post per processare i dati */

Route::get('register', [RegisterController::class, 'register_form'])->name('register');
Route::post('register', [RegisterController::class, 'do_register'])->name('do_register');

Route::get("logout",[LoginController::class, 'logout'])->name('logout');

Route::get('login', [LoginController::class, 'login_form'])->name('login');
Route::post('login', [LoginController::class, 'do_login'])->name('do_login');

// Route semplici per reset password
Route::post('/send-reset-code', [LoginController::class, 'sendResetCode']);
Route::post('/reset-password', [LoginController::class, 'resetPassword']);

Route::get("/api/check_email", [ValidationController::class, 'checkEmail']);
Route::get("/api/check_username", [ValidationController::class, 'checkUsername']);


Route::get("index",[IndexController::class,"showIndex"])->name("index");

Route::get("/api/testimonials",[IndexController::class,"showTestimonials"])->name("testimonials");

Route::get("products/{categoria}",[ProductController::class,"showProducts"])->name("products");

Route::get("product/{id}",[ProductController::class,"showProductDetails"])->name("product");

Route::post("product/review", [ProductController::class, "storeReview"])->name("product.review.store");

Route::get("searchProduct", [ProductController::class, "searchProduct"])->name("searchProduct");


Route::post("/newsletter/subscribe", [NewsletterController::class, "subscribe"]);


Route::get("cart", [CartController::class, "showCart"])->name("cart.show");

Route::post("cart/action", [CartController::class, "handleCartAction"])->name("cart.action");


Route::get("checkout", [CartController::class, "showCheckout"])->name("checkout.show");

Route::get("checkout/success", [CartController::class, "checkoutSuccess"])->name("checkout.success");


