<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\API\Auth\AuthController;





Route::controller(AuthController::class)->group(function () {
    Route::post('signup', [AuthController::class,'signup'])->name('auth.signup');
	Route::post('login', [AuthController::class,'login'])->name('auth.login');
	Route::post('logout', [AuthController::class,'logout'])->middleware('auth:sanctum')->name('auth.logout');
    Route::get('user', [AuthController::class,'getAuthenticatedUser'])->middleware('auth:sanctum')->name('auth.user');

	Route::post('/password/email', [AuthController::class,'sendPasswordResetLinkEmail'])->middleware('throttle:5,1');
	Route::post('/password/reset', [AuthController::class,'resetPassword'])->name('password.reset');
    
});

//Contact
Route::get('/contact',[ContactController::class,'allContact']);
Route::post('/contact_us',[ContactController::class,'insert']);


//product
Route::get('/producthome',[ProductController::class,'homeProduct']);
Route::get('/productall',[ProductController::class,'AllProduct']);
Route::get('/productdetails/{productid}',[ProductController::class,'Productdetails']);


//search
Route::get('/search/{key}',[ProductController::class,'Productsearch']);


//footer
Route::get('/footer',[FooterController::class,'getFooter']);





//about
Route::get('/about',[AboutController::class,'getAbout']);
Route::get('/aboutdesc',[AboutController::class,'getAboutdesc']);



//home
Route::get('/home',[HomeController::class,'gethome']);

//product cart
Route::post('/addtocart',[CartController::class,'addToCart']);


// cart count
Route::get('/cartcount/{id}',[CartController::class,'CartCount']);






// cartlist
Route::get('/cartlist/{email}', [CartController::class, 'getUserCart']);

// remove cartlist
Route::get('/removecartlist/{id}', [CartController::class, 'removeCartList']);

// remove cartitemplus
Route::get('/cartitemplus/{id}', [CartController::class, 'cartItemPlus']);
// remove cartitemminus
Route::get('/cartitemminus/{id}', [CartController::class, 'cartItemMinus']);

Route::get('/orderlist/{email}/{order_status}', [CartController::class, 'orderlist']);


// cart order
Route::post('/cartorder', [CartController::class, 'CartOrder']);


// visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
