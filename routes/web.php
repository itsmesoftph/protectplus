<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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



Route::get('/home',[
    'uses'=>'HomeController@Index',
    'as'=>'home',
    'middleware'=> 'user'
]);



Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/',
[
    'uses'=>'HomeController@Index',
    'as'=>'home',
    'middleware'=> 'user'

]


);

// Route::get('/add-to-cart/{product}', [
//     'uses'=>'CartController@add',
//     'as'=>'cart.add',
//     'middleware'=> 'user'
// ]);

Route::get('/add-item-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('user');

Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('user');

Route::get('/cart/destroy/{itemId}', [
    'uses'=>'CartController@destroy',
    'as'=>'cart.destroy',
    'middleware'=> 'user'
]);

Route::get('/cart/update/{rowId}', [
    'uses'=>'CartController@update',
    'as'=>'cart.update',
    'middleware'=> 'user'
]);


Route::get('/cart/checkout', [
    'uses'=>'CartController@checkout',
    'as'=>'cart.checkout',
    'middleware'=> 'user'
]);






// WALKIN CONTROLLER
Route::get('/walkin_cart/checkout', 'CartWalkInController@checkout')->name('walkin.checkout')->middleware('sales');


Route::get('/walkin_cart/destroy/{itemId}', 'CartWalkInController@destroy')->name('walkin_cart.destroy')->middleware('sales');

Route::get('/add-to-cart/{product}', 'CartWalkInController@add')->name('walkin.add')->middleware('sales');

Route::get('/walk_in/update/{rowId}', 'CartWalkInController@update')->name('walkin.update')->middleware('sales');


Route::get('/walkin_cart', 'CartWalkInController@index')->name('walkin.index')->middleware('sales');
Route::get('/walkin_shop', 'CartWalkInController@getProduct')->name('walkin')->middleware('sales');


// PRODUCTION
Route::get('/inventory_dashboard', 'InventoryController@index')->name('inventory')->middleware('production');
Route::get('/inventory/update/{rowId}', 'InventoryController@getUpdate')->name('production.edit')->middleware('production');
Route::post('/inventory/update/{rowId}', 'InventoryController@postUpdate')->name('production.update')->middleware('production');
Route::get('/inventory/add', 'InventoryController@getAdd')->name('production.add')->middleware('production');
Route::post('/inventory/add', 'InventoryController@createProduct')->name('production.create')->middleware('production');


// UPDATE PRODUCT QUANTITY
Route::get('/inventory/update/{rowId}', 'InventoryController@quantityUpdate')->name('quantity.update')->middleware('production');

// ESTIMATES
Route::get('/inventory/estimates', 'InventoryController@getEstimates')->name('estimates')->middleware('production');
Route::post('/inventory/estimates/add', 'InventoryController@estimateStore')->name('estimates.store')->middleware('production');


// CREATE PRODUCT CODE
Route::get('/inventory/product-code', 'InventoryController@getProductCode')->name('product_code')->middleware('production');
Route::post('/inventory/product-code/store', 'InventoryController@productCodeStore')->name('product_code.store')->middleware('production');
Route::get('/inventory/product-code/edit/{rowId}', 'InventoryController@productCodeEdit')->name('product_code.edit')->middleware('production');
Route::post('/inventory/product-code/update/{rowId}', 'InventoryController@productCodeUpdate')->name('product_code.update')->middleware('production');



// ORDER CREATION
Route::get('/distro_dashboard', 'DistroOrderController@index')->name('distro')->middleware('distro');
Route::get('/distro/update/{rowId}', 'DistroOrderController@getUpdate')->name('distro.edit')->middleware('distro');
Route::post('/distro/update/{rowId}', 'DistroOrderController@postUpdate')->name('distro.update')->middleware('distro');


// ORDER APPROVE
Route::get('/sales_dashboard', 'SalesController@index')->name('sales')->middleware('sales');
Route::get('/sales/update/{rowId}', 'SalesController@getUpdate')->name('sales.edit')->middleware('sales');
Route::post('/sales/update/{rowId}', 'SalesController@postUpdate')->name('sales.update')->middleware('sales');



// DR CREATED
Route::get('/delivery_dashboard', 'DeliveryController@index')->name('delivery')->middleware('delivery');
Route::get('/delivery/update/{rowId}', 'DeliveryController@getUpdate')->name('delivery.edit')->middleware('delivery');
Route::post('/delivery/udpate/{rowId}', 'DeliveryController@postUpdate')->name('delivery.update')->middleware('delivery');

// LISTING OF PRINTED DR
Route::get('/dr_created_dashboard', 'DeliveryController@getDrCreated')->name('delivery.created')->middleware('delivery');


// PRINT CONTROLLER FOR DR
Route::get('/delivery/print/{rowId}', 'PrinterController@prntPreview')->name('delivery.print')->middleware('delivery');

// LIST OF CREATED DR
Route::get('/delivery/list/{rowId}', 'DeliveryController@getDrList')->name('delivery.list')->middleware('delivery');



// PAYMENT
Route::get('/payment_dashboard', 'PaymentController@index')->name('payment')->middleware('payment');
Route::get('/payment/update/{rowId}', 'PaymentController@getUpdate')->name('payment.edit')->middleware('payment');
Route::post('/payment/update/{rowId}', 'PaymentController@postUpdate')->name('payment.update')->middleware('payment');

// RELEASING
Route::get('/releasing_dashboard', 'ReleasingController@index')->name('releasing')->middleware('releasing');
Route::get('/releasing/update/{rowId}', 'ReleasingController@getUpdate')->name('releasing.edit')->middleware('releasing');
Route::post('/releasing/update/{rowId}', 'ReleasingController@postUpdate')->name('releasing.update')->middleware('releasing');



// SUPERVISOR
Route::get('/overview_dashboard', 'OverviewController@index')->name('overview')->middleware('supervisor');
Route::get('/ajax', 'OverviewController@ajax')->name('orders.data');


Route::resource('orders','OrderController')->middleware('auth');


// Route::get('login', ['as' => '', 'uses' => 'Auth\LoginController@login']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
