<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



// Catgory Controller 
Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::patch('/categories/{category}/update',[CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/{category}/delete',[CategoryController::class,'destroy'])->name('categories.delete');
Route::get('/categories/trashed',[CategoryController::class,'trashedList'])->name('categories.trashed');
Route::get('/categories/restore/{category_id}',[CategoryController::class,'restore'])->name('categories.restore');
Route::get('/categories/forcedelete/{category_id}',[CategoryController::class,'forcedelete'])->name('categories.forcedelete');

// subcategories
Route::get('/subcategories',[SubcategoryController::class,'index'])->name('subcategories');
Route::post('/subcategories/store',[SubcategoryController::class,'store'])->name('subcategories.store');
Route::get('/subcategories/{subcategory}/edit',[SubcategoryController::class,'edit'])->name('subcategories.edit');
// Route::patch('/subcategories/{subcategory}/update',[CategoryController::class,'update'])->name('subcategories.update');
Route::get('/subcategories/{subcategory}/delete',[SubcategoryController::class,'destroy'])->name('subcategories.delete');
Route::get('/subcategories/trashed',[SubcategoryController::class,'trashedList'])->name('subcategories.trashed');
// Route::get('/subcategories/restore/{subcategory}',[CategoryController::class,'restore'])->name('subcategories.restore');
// Route::get('/subcategories/forcedelete/{subcategory}',[CategoryController::class,'forcedelete'])->name('subcategories.forcedelete');

// product route 
Route::controller(ProductController::class)->prefix('products')->name('products')->group(function(){

Route::get('/','index')->name('');
Route::post('/store','store')->name('.store');
Route::get('/{category}/edit','edit')->name('.edit');
Route::patch('/{category}/update','update')->name('.update');
Route::get('/{category}/delete','destroy')->name('.delete');
Route::get('/trashed','trashedList')->name('.trashed');
Route::get('/restore/{category_id}','restore')->name('.restore');
Route::get('/forcedelete/{category_id}','forcedelete')->name('.forcedelete');
Route::get('/forcedelete/{category_id}','forcedelete')->name('.forcedelete');


});
Route::post('/getSubcategory',[ProductController::class, 'getSubcategory']);


// Role Controller 
Route::get('role',[RoleController::class,'index'])->name('role');
Route::post('role/create',[RoleController::class,'create'])->name('role.create');

// variation
Route::controller(VariationController::class)->group(function(){

Route::get('/colors','index')->name('colors');
Route::get('/sizes','index')->name('sizes');
Route::post('color/store','add_color')->name('color.store');
Route::post('size/store','add_size')->name('size.store');

});

// Inventory 

Route::controller(InventoryController::class)->group(function(){

Route::get('/inventory/{product}','index')->name('inventories');
Route::post('/inventory/store','store')->name('inventories.store');
Route::post('/inventory/edit','edit')->name('inventories.edit');
Route::post('/inventory/delete','delete')->name('inventories.delete');

});


// user Controller 
Route::controller(UserController::class)->group(function(){

Route::get('/all/users','index')->name('all.users');

});














});

// Frontend 
Route::controller(FrontendController::class)->group(function(){

Route::get('/','index')->name('index');
Route::get('single-product/{product}','single_product')->name('single_product');
Route::get('cart','cart')->name('cart');

Route::get('complete-order','complete_order')->name('order.success');
Route::get('my-orders','my_orders')->name('my_orders');
Route::get('profile-info','profileInfo')->name('profile_info');
Route::get('wishlist','wishlist')->name('wishlist');
Route::get('contact','contact')->name('contact');
Route::get('about','about')->name('about');
Route::post('/getSize','getSize')->name('getSize');


});


// checkout 
Route::controller(CheckoutController::class)->group(function(){
Route::get('checkout','index')->name('checkout');
Route::post('getCity','getCity')->name('/getCity');
Route::post('order/store','order_store')->name('order.store');


});



// cart
Route::controller(CartController::class)->group(function(){
Route::get('cart','index')->name('cart');
Route::post('/add-to-cart','store')->name('/addTocart');
Route::get('/cart/remove/{cart}','destroy')->name('cart.remove');


});

// coupon
Route::controller(CouponController::class)->group(function(){
Route::get('coupon','index')->name('coupon');
Route::post('coupon/check','check')->name('coupon.check');
Route::post('coupon/store','store')->name('coupon.store');


});

// customer 
Route::controller(CustomerController::class)->group(function(){

Route::get('/customer/login/register','index')->name('login.register');
Route::post('/customer/store','register')->name('customer.store');
Route::post('/customer/login','login')->name('customer.login');
Route::get('customer/invoice/{order_id}','invoice')->name('customer.invoice');
Route::post('customer/review/store','review_store')->name('review.store');



});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

// stripe 
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


Route::get('/d',function(){
    return view('frontend.index');
});
Route::get('/ok',function(){
    return view('frontend.single_product');
});
require __DIR__.'/auth.php';









