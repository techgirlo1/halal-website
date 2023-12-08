<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteaboutProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth.and.logout'], function () {
    // Your routes that require authentication

    
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


//logout routes
    
Route::get('logout', [UserController::class,'adminlogout'] )->name("logout");


Route::prefix('admin')->group(function(){
    Route::get('/user_profile', [UserController::class,'profile'] )->name("user_profile");
    Route::get('/edit_profile', [UserController::class,'editprofile'] )->name("edit_profile");
    Route::post('/edit_profile/insert', [UserController::class,'updateprofile'] )->name("insertprofile");
    Route::get('/changepassword', [UserController::class,'resetpassword'] )->name("change_password");
    Route::post('/changepassword/insert', [UserController::class,'insertpassword'] )->name("changepassword");
});


Route::prefix('about')->group(function(){
    Route::get('/all_about', [AboutController::class,'allAbout'] )->name("all_about");
    Route::get('/add_about', [AboutController::class,'addabout'] )->name("add_about");
    Route::post('/add_about/insert', [AboutController::class,'insertabout'] )->name("insert_about");
    Route::get('/edit/{id}', [AboutController::class,'edit'] );
    Route::post('/edit_about/{id}', [AboutController::class,'editabout'] );
    Route::get('/delete/{id}', [AboutController::class,'deleteabout'] );
   
   
});


Route::prefix('footer')->group(function(){
    Route::get('/all_footer', [FooterController::class,'footer'] )->name("all_footer");
    Route::get('/add_footer', [FooterController::class,'addfooter'] )->name("add_footer");
    Route::post('/add_footer/insert', [FooterController::class,'insertfooter'] )->name("insert_footer");
    Route::get('/edit/{id}', [FooterController::class,'edit'] );
    Route::post('/edit_footer/{id}', [FooterController::class,'editfooter'] );
    Route::get('/delete/{id}', [FooterController::class,'deletefooter'] );
   
   
});


Route::prefix('contact')->group(function(){
    Route::get('/all_contact', [ContactController::class,'contact'] )->name("all_contact");
    Route::get('/delete/{id}', [ContactController::class,'deletecontact'] );
   
   
});




Route::prefix('product')->group(function(){
    Route::get('/all_product', [ProductController::class,'allproducts'] )->name("all_product");
    Route::get('/add_product', [ProductController::class,'addproduct'] )->name("add_product");
    Route::post('/add_product/insert', [ProductController::class,'insertproduct'] )->name("insert_product");
    Route::get('/edit/{id}', [ProductController::class,'edit'] );
    Route::post('/edit_product/{id}', [ProductController::class,'editproduct'] );
    Route::get('/delete/{id}', [ProductController::class,'deleteproject'] );
   
   
});


Route::prefix('order')->group(function(){
    Route::get('/all_pending', [CartController::class,'pendingOrder'] )->name("pending");
    Route::get('/all_processing', [CartController::class,'processingOrder'] )->name("processing");
    Route::get('/all_complete', [CartController::class,'completeOrder'] )->name("complete");
    Route::get('/pendingstatus/{id}', [CartController::class,'pendingDetails'] );
    Route::get('/status/process/{id}', [CartController::class,'pendingprocess'] )->name("pending.process");
    Route::get('/status/complete/{id}', [CartController::class,'completeprocess'] )->name("processing.complete");
    Route::get('/delete/{id}', [CartController::class,'deleteprocess'] );
   
   
   
   
});
});


