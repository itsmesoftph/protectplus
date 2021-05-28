<?php

use App\Http\Controllers\PaymentController;
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






Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');



// Route::get('/add-to-cart/{product}', [
//     'uses'=>'CartController@add',
//     'as'=>'cart.add',
//     'middleware'=> 'user'
// ]);


Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'user'],function(){
        Route::get('/',['uses'=>'HomeController@Index','as'=>'home',]);
        Route::get('/home',['uses'=>'HomeController@Index','as'=>'home']);
        Route::get('/add-item-to-cart/{product}', 'CartController@add')->name('cart.add');
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::get('/cart/destroy/{itemId}', ['uses'=>'CartController@destroy','as'=>'cart.destroy',]);
        Route::get('/cart/update/{rowId}', ['uses'=>'CartController@update','as'=>'cart.update',]);
        Route::get('/cart/checkout', ['uses'=>'CartController@checkout','as'=>'cart.checkout',]);
    });

    // SALES
    Route::group(['middleware' => 'sales'], function(){
        // WALKIN CONTROLLER
        Route::get('/walkin_cart/checkout', 'CartWalkInController@checkout')->name('walkin.checkout');
        Route::get('/walkin_cart/destroy/{itemId}', 'CartWalkInController@destroy')->name('walkin_cart.destroy');
        Route::get('/add-to-cart/{product}', 'CartWalkInController@add')->name('walkin.add');
        Route::get('/walk_in/update/{rowId}', 'CartWalkInController@update')->name('walkin.update');
        Route::get('/walkin_cart', 'CartWalkInController@index')->name('walkin.index');
        Route::get('/walkin_shop', 'CartWalkInController@getProduct')->name('walkin');

        // ORDER APPROVE
        Route::get('/sales_dashboard', 'SalesController@index')->name('sales');
        Route::get('/sales/update/{rowId}', 'SalesController@getUpdate')->name('sales.edit');
        Route::post('/sales/update/{rowId}', 'SalesController@postUpdate')->name('sales.update');
        Route::get('/sales_promo', 'SalesController@getProductData')->name('sales.promo');
        Route::get('/sales_get_product/{rowId}', 'SalesController@loadProduct')->name('sales.find');
        Route::post('/sales_create_promo', 'SalesController@createPromo')->name('sales.create-promo');
        Route::post('/sales_load_featured_product', 'SalesController@createFeaturedProduct')->name('sales.create-featured-product');
        Route::get('/sales_edit_create_featured_product/{rowId}', 'SalesController@loadFeaturedProduct')->name('sales.get-featured-product');
    });

    // PRODUCTION
    Route::group(['middleware' => 'production'], function(){

        Route::get('/inventory_dashboard', 'InventoryController@index')->name('inventory');
        Route::get('/inventory/update/{rowId}', 'InventoryController@getUpdate')->name('production.edit');
        Route::post('/inventory/update/{rowId}', 'InventoryController@postUpdate')->name('production.update');
        Route::get('/inventory/add', 'InventoryController@getAdd')->name('production.add');
        Route::post('/inventory/add', 'InventoryController@createProduct')->name('production.create');

        // UPDATE PRODUCT QUANTITY
        Route::get('/inventory/update/{rowId}', 'InventoryController@quantityUpdate')->name('quantity.update');

        // ESTIMATES
        Route::get('/inventory/estimates', 'InventoryController@getEstimates')->name('estimates');
        Route::post('/inventory/estimates/add', 'InventoryController@estimateStore')->name('estimates.store');

        // CREATE PRODUCT CODE
        Route::get('/inventory/product-code', 'InventoryController@getProductCode')->name('product_code');
        Route::post('/inventory/product-code/store', 'InventoryController@productCodeStore')->name('product_code.store');
        Route::get('/inventory/product-code/edit/{rowId}', 'InventoryController@productCodeEdit')->name('product_code.edit');
        Route::post('/inventory/product-code/update/{rowId}', 'InventoryController@productCodeUpdate')->name('product_code.update');

    });

    // DISTRO
    Route::group(['middleware' => 'distro' ], function(){
        Route::get('/distro_dashboard', 'DistroOrderController@index')->name('distro');
        Route::get('/distro/update/{rowId}', 'DistroOrderController@getUpdate')->name('distro.edit');
        Route::post('/distro/update/{rowId}', 'DistroOrderController@postUpdate')->name('distro.update');
    });

    //DR CREATED
    Route::group(['middleware'=>'delivery'], function(){
        Route::get('/delivery_dashboard', 'DeliveryController@index')->name('delivery');
        Route::get('/delivery/update/{rowId}', 'DeliveryController@getUpdate')->name('delivery.edit');
        Route::post('/delivery/udpate/{rowId}', 'DeliveryController@postUpdate')->name('delivery.update');

        // LISTING OF PRINTED DR
        Route::get('/dr_created_dashboard', 'DeliveryController@getDrCreated')->name('delivery.created');

        // PRINT CONTROLLER FOR DR
        Route::get('/delivery/print/{rowId}', 'PrinterController@prntPreview')->name('delivery.print');

        // LIST OF CREATED DR
        Route::get('/delivery/list/{rowId}', 'DeliveryController@getDrList')->name('delivery.list');
    });

    // PAYMENT
    Route::group(['middleware' => 'payment'],function(){
        // Route::resource('payment', [PaymentController::class]);
        Route::get('/payment_dashboard', 'PaymentController@index')->name('payment');
        Route::get('/payment/update/{rowId}', 'PaymentController@getUpdate')->name('payment.edit');
        Route::post('/payment/update/{rowId}', 'PaymentController@postUpdate')->name('payment.update');
    });

    // RELEASING
    Route::group(['middleware' => 'releasing'],function(){
        Route::get('/releasing_dashboard', 'ReleasingController@index')->name('releasing');
        Route::get('/releasing/update/{rowId}', 'ReleasingController@getUpdate')->name('releasing.edit');
        Route::post('/releasing/update/{rowId}', 'ReleasingController@postUpdate')->name('releasing.update');
    });

    // SUPERVISOR
    Route::group(['middleware' => 'supervisor'],function(){
        Route::get('/overview_dashboard', 'OverviewController@index')->name('overview');
        Route::get('/production_dashboard', 'OverviewController@production')->name('production');
        Route::get('/sales_summary_dashboard', 'OverviewController@salesSummary')->name('sales_summary');
        Route::get('/estimator_dashboard', 'OverviewController@getEstimator')->name('estimator');
    });

    Route::get('/ajax', 'OverviewController@ajax')->name('orders.data');

    Route::resource('orders','OrderController')->middleware('auth');

    // ADMIN
    Route::group(['middleware'=>'admin'],function(){
        Route::get('/admin', 'AdminController@getAdminIndex')->name('admin');
        Route::get('/admin_users', 'AdminController@getAllUser')->name('admin.users');
        Route::get('/admin_edit_user/{rowId}', 'AdminController@getUserById')->name('admin.getUserById');
        Route::post('/admin_update_user/{rowId}', 'AdminController@updateUserDetails')->name('admin.update-user');
        Route::get('/admin_add_user', 'AdminController@getUserForm')->name('admin.add-user-form');
        Route::post('/admin_add_user', 'AdminController@addUser')->name('admin.add-user-process');

        Route::get('/admin_roles', 'AdminController@getAllRoles')->name('admin.roles');
        Route::get('/admin_add_roles','AdminController@getRolesForm')->name('admin.add-roles-form');
        Route::post('/admin_add_roles', 'AdminController@addRole')->name('admin.add-roles-process');
        Route::get('/admin_add_roles/{rowId}', 'AdminController@update_getRolesForm')->name('admin.edit-roles-form');
        Route::post('/admin_update_roles/{rowId}', 'AdminController@updateRoles')->name('admin.edit-roles-process');


        Route::get('/admin_product', 'AdminController@getAllPProduct')->name('admin.product');
        Route::get('/admin_edit_product/{rowId}', 'AdminController@getProductForm')->name('admin.edit-product');
        Route::post('/admin_update_product/{rowId}', 'AdminController@updateProduct')->name('admin.update-product');
        Route::get('/admin_add_product_form', 'AdminController@get_addProductForm')->name('admin.add-product-form');

        Route::post('/admin_add_product', 'AdminController@addProduct')->name('admin.add-product-process');
    });

});


// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });







