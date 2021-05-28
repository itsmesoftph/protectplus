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

// SALES MODULE
// 1. ORDERS
Route::get('/sales_dashboard', 'SalesController@index')->name('sales')->middleware('sales');
// edit order details
Route::get('/sales/order/{rowId}', 'SalesController@getOrderById')->name('sales.order.edit')->middleware('sales');
// update order details
Route::post('/sales/update_order/{rowId}', 'SalesController@postOrderUpdate')->name('sales.order.update')->middleware('sales');
// voew order details
Route::get('/sales/product_info/{rowId}', 'SalesController@getProductById')->name('sales.find')->middleware('sales');


// 2. WALKIN MODULE - (WALKIN CONTROLLER)

Route::get('/walkin_cart', 'CartWalkInController@index')->name('walkin.index')->middleware('sales');

Route::get('/walkin_cart/checkout', 'CartWalkInController@checkout')->name('walkin.checkout')->middleware('sales');

Route::get('/walkin_cart/destroy/{itemId}', 'CartWalkInController@destroy')->name('walkin_cart.destroy')->middleware('sales');

Route::get('/add-to-cart/{product}', 'CartWalkInController@add')->name('walkin.add')->middleware('sales');

Route::get('/walk_in/update/{rowId}', 'CartWalkInController@update')->name('walkin.update')->middleware('sales');

Route::get('/walkin_shop', 'CartWalkInController@getProduct')->name('walkin')->middleware('sales');




// 3. PROMO
// show/load products
Route::get('/sales/promo', 'SalesController@getProductData')->name('sales.promo')->middleware('sales');
// show selected product by id
Route::get('/sales/promo/view/{rowId}', 'SalesController@getProductById')->name('sales.promo.view')->middleware('sales');
// create promo on selected product
Route::post('/sales/promo/create', 'SalesController@createPromo')->name('sales.promo.create')->middleware('sales');
// load promo form with details of selected product
Route::get('/sales/promo/edit/{rowId}', 'SalesController@editPromoForm')->name('sales.promo.edit')->middleware('sales');
// show selected product by id
Route::get('/sales/featured/view/{rowId}', 'SalesController@getFeaturedProductById')->name('sales.featured.view')->middleware('sales');
// load featured product form with details of selected product
Route::get('/sales/featured/edit/{rowId}', 'SalesController@editFeaturedForm')->name('sales.featured.edit')->middleware('sales');


Route::post('/sales_load_featured_product', 'SalesController@createFeaturedProduct')->name('sales.create-featured-product')->middleware('sales');
Route::get('/sales_edit_create_featured_product/{rowId}', 'SalesController@loadFeaturedProduct')->name('sales.get-featured-product')->middleware('sales');


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
Route::get('/payment/paid_orders', 'PaymentController@getPaidOrders')->name('payment.show.paid_orders')->middleware('payment');


// RELEASING
Route::get('/releasing_dashboard', 'ReleasingController@index')->name('releasing')->middleware('releasing');
Route::get('/releasing/update/{rowId}', 'ReleasingController@getUpdate')->name('releasing.edit')->middleware('releasing');
Route::post('/releasing/update/{rowId}', 'ReleasingController@postUpdate')->name('releasing.update')->middleware('releasing');
Route::get('/releasing/released_orders', 'ReleasingController@getReleasedOrders')->name('releasing.show.released_orders')->middleware('releasing');

// SUPERVISOR
Route::get('/overview_dashboard', 'OverviewController@index')->name('overview')->middleware('supervisor');
Route::get('/production_dashboard', 'OverviewController@production')->name('production')->middleware('supervisor');
Route::get('/sales_summary_dashboard', 'OverviewController@salesSummary')->name('sales_summary')->middleware('supervisor');
Route::get('/estimator_dashboard', 'OverviewController@getEstimator')->name('estimator')->middleware('supervisor');

Route::get('/ajax', 'OverviewController@ajax')->name('orders.data');

Route::resource('orders','OrderController')->middleware('auth');

// Route::get('login', ['as' => '', 'uses' => 'Auth\LoginController@login']);

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });

Route::get('/admin', 'AdminController@getAdminIndex')->name('admin')->middleware('admin');
Route::get('/admin_users', 'AdminController@getAllUser')->name('admin.users')->middleware('admin');
Route::get('/admin_edit_user/{rowId}', 'AdminController@getUserById')->name('admin.getUserById')->middleware('admin');
Route::post('/admin_update_user/{rowId}', 'AdminController@updateUserDetails')->name('admin.update-user')->middleware('admin');
Route::get('/admin_add_user', 'AdminController@getUserForm')->name('admin.add-user-form')->middleware('admin');
Route::post('/admin_add_user', 'AdminController@addUser')->name('admin.add-user-process')->middleware('admin');

Route::get('/admin_roles', 'AdminController@getAllRoles')->name('admin.roles')->middleware('admin');
Route::get('/admin_add_roles','AdminController@getRolesForm')->name('admin.add-roles-form')->middleware('admin');
Route::post('/admin_add_roles', 'AdminController@addRole')->name('admin.add-roles-process')->middleware('admin');
Route::get('/admin_add_roles/{rowId}', 'AdminController@update_getRolesForm')->name('admin.edit-roles-form')->middleware('admin');
Route::post('/admin_update_roles/{rowId}', 'AdminController@updateRoles')->name('admin.edit-roles-process')->middleware('admin');


Route::get('/admin_product', 'AdminController@getAllPProduct')->name('admin.product')->middleware('admin');
Route::get('/admin_edit_product/{rowId}', 'AdminController@getProductForm')->name('admin.edit-product')->middleware('admin');
Route::post('/admin_update_product/{rowId}', 'AdminController@updateProduct')->name('admin.update-product')->middleware('admin');
Route::get('/admin_add_product_form', 'AdminController@get_addProductForm')->name('admin.add-product-form')->middleware('admin');

Route::post('/admin_add_product', 'AdminController@addProduct')->name('admin.add-product-process')->middleware('admin');


Route::get('/admin_view_category', 'AdminController@getAllCategory')->name('admin.view-all-category')->middleware('admin');
Route::get('/admin_add_category_form', 'AdminController@get_addCategoryForm')->name('admin.add-category-form')->middleware('admin');
Route::post('/admin_add_category', 'AdminController@addCategory')->name('admin.add-category-process')->middleware('admin');
Route::get('/admin_add_faq_form', 'AdminController@get_addFaqForm')->name('admin.add-faq-form')->middleware('admin');
Route::post('/admin_add_faq', 'AdminController@addFaq')->name('admin.add-faq-process')->middleware('admin');




Route::get('/FAQ', 'AdminController@getFaq')->name('faq')->middleware('admin');


Route::get('/faq_page','HomeController@help')->name('help')->middleware('distro');
