<?php

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

Route::get('/', 'PagesController@index');
// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//Route::get('/home', 'PagesController@userDashboard')->name('home')->middleware('auth');
Route::get('/home/{any}', function() {
    return view('home');    
})->where('any', '.*')->middleware('verified');

Route::group([
    'middleware' => 'admin',
    'prefix' => 'dashboard/admin'
], function() {
    Route::get('', 'PagesController@dashboard');
    Route::get('/users', 'PagesController@users');
    Route::get('/user/{id}', 'PagesController@user');
    Route::post('/user/setAdmin', 'AdminController@setAdmin');
    Route::get('/user/{id}/toggleAdmin/{type}', 'AdminController@toggleAdmin');
    Route::get ('/user/{id}/toggleStar', 'AdminController@toggleStar');

    Route::get('/addProfile', 'PagesController@addProfile');
    Route::get('/editProfile/{id}', 'PagesController@editProfile');

    Route::get('/databoard', 'PagesController@databoard');
    Route::get('/databoard/addData/{id}', 'PagesController@addData');
    Route::get('/databoard/editPackage/{id}', 'PagesController@editPackage');
    Route::get('/databoard/editProduct/{id}', 'PagesController@editProduct');

    Route::get('/orderboard', 'PagesController@orderboard');
    Route::get('/orderboard/category/{id}', 'PagesController@categorizedOrders');

    Route::get('/order', 'PagesController@editOrder');

    Route::get('/data/businesscards', 'PagesController@businesscards');
    Route::get('/data/businesscard/{id}', 'PagesController@businesscard');
    Route::get('/data/businesscard/label/{id}', 'PagesController@businesscardLabel');

    Route::get('/data/commercial/items', 'CommercialItemsController@itemsPage');
    Route::get('/data/commercial/item/{id}', 'CommercialItemsController@itemPage');

    Route::get('/data/personal/items', 'PagesController@adminDisplayPersonalItems');
    Route::get('/data/personal/item/{id}', 'PagesController@adminDisplayPersonalItem');
    Route::get('/data/personal/subitem/{id}', 'PersonalItemsController@subitemPage');
    Route::get('/data/personal/item/{id}/edit', 'PersonalItemsController@editItemPage');
    Route::get('/data/personal/subitem/{id}/edit', 'PersonalItemsController@editSubitemPage');

    Route::get('/orderboard/commercial', 'CommercialOrdersController@orderboardPage');
    Route::get('/orderboard/commercial/{id}', 'CommercialOrdersController@orderPage');
    Route::put('/orderboard/commercial/{id}', 'CommercialOrdersController@editOrder');

    Route::get('/data/flyers', 'FlyersController@flyersPage');
    Route::get('/data/flyer/{id}', 'FlyersController@flyerPage');

    Route::get('/data/commercial/designs/{category_id}', 'CommercialItemsController@designsPage');
    Route::get('/data/commercial/design/{id}', 'CommercialItemsController@designPage');
    Route::get('/data/commercial/label/{id}', 'CommercialItemsController@labelPage');
    Route::get('/data/commercial/color/{id}', 'CommercialItemsController@colorPage');
    Route::get('/data/commercial/design/{id}/edit', 'CommercialItemsController@editDesignPage');
    Route::get('/data/commercial/item/{id}/edit', 'CommercialItemsController@editItemPage');
    Route::get('/data/commercial/design/{id}/label/create', 'CommercialItemsController@createLabelPage');
    
    Route::get('/test', 'PagesController@adminTestPage');

    Route::post('/databoard/addPackage', 'AdminController@addPackage');
    Route::put('/databoard/editPackage/{id}', 'AdminController@editPackage');
    Route::delete('/databoard/deletePackage', 'AdminController@deletePackage');

    Route::post('/databoard/addProduct', 'AdminController@addProduct');
    Route::put('/databoard/editProduct/{id}', 'AdminController@editProduct');
    Route::delete('/databoard/deleteProduct', 'AdminController@deleteProduct');

    Route::post('/profile', 'AdminController@addProfile');
    Route::put('/profile/{id}', 'AdminController@editProfile');
    Route::delete('/profiles', 'AdminController@deleteProfile');

    Route::put('/user/{id}', 'AdminController@editUser');

    Route::put('/order', 'AdminController@editOrder');

    Route::post('/businesscard', 'AdminController@addBusinesscard');
    Route::delete('/businesscards', 'AdminController@deleteBusinesscards');

    Route::post('/businesscard/{id}/label', 'AdminController@addBusinesscardLabel');
    Route::delete('/businesscard/labels', 'AdminController@deleteBusinesscardLabels');

    Route::post('/businesscard/{id}/color', 'AdminController@addBusinesscardColor');
    Route::get('/businesscard/deleteColor/{id}', 'AdminController@deleteBusinesscardColor');
    Route::delete('/businesscard/colors', 'AdminController@deleteBusinesscardColors');

    Route::post('/data/commercial/item', 'CommercialItemsController@addItem');
    Route::put('/data/commercial/item/{id}', 'CommercialItemsController@editItem');
    Route::delete('/data/commercial/items', 'CommercialItemsController@deleteItems');

    Route::post('/data/personal/item', 'PersonalItemsController@addPersonalItem');
    Route::put('/data/personal/item/{id}', 'PersonalItemsController@editItem');
    Route::delete('/data/personal/items', 'PersonalItemsController@deletePersonalItems');
    Route::post('/data/personal/item/{id}/subitem', 'PersonalItemsController@addPersonalSubitem');
    Route::put('/data/personal/subitem/{id}', 'PersonalItemsController@editSubitem');
    Route::delete('/data/personal/subitems', 'PersonalItemsController@deletePersonalSubitems');

    Route::post('/data/flyer', 'FlyersController@addFlyer');
    Route::delete('/data/flyers', 'FlyersController@deleteFlyers');
    Route::post('/flyer/{id}/label', 'FlyersController@addLabel');
    Route::delete('/flyer/labels', 'FlyersController@deleteLabels');
    Route::post('/flyer/{id}/color', 'FlyersController@addColor');
    Route::get('/flyer/deleteColor/{id}', 'FlyersController@deleteColor');

    Route::post('/data/commercial/design/{category_id}', 'CommercialItemsController@addDesign');
    Route::delete('/data/commercial/designs', 'CommercialItemsController@deleteDesigns');
    Route::post('/data/commercial/design/{id}/label', 'CommercialItemsController@addLabel');
    Route::delete('/data/commercial/labels', 'CommercialItemsController@deleteLabels');
    Route::post('/data/commercial/design/{id}/color', 'CommercialItemsController@addColor');
    Route::get('/data/commercial/deleteColor/{id}', 'CommercialItemsController@deleteColor');
    Route::put('/data/commercial/label/{id}', 'CommercialItemsController@editLabel');
    Route::put('/data/commercial/color/{id}', 'CommercialItemsController@editColor');
    Route::put('/data/commercial/design/{id}', 'CommercialItemsController@editDesign');
    
    Route::get('/data/store/products', 'StoreController@productsPage');
    Route::get('/data/store/product/create', 'StoreController@createProductPage');
    Route::get('/data/store/product/{id}', 'StoreController@productPage');
    Route::get('/data/store/product/{id}/edit', 'StoreController@editProductPage');

    
    Route::post('/data/store/product', 'StoreController@createProduct');
    Route::put('/data/store/product/{id}/edit', 'StoreController@editProduct');
    Route::delete('/data/store/products', 'StoreController@deleteProducts');
    
    Route::get('/orderboard/store', 'StoreController@superAdminStoreOrdersPage');
    Route::get('/orderboard/store/{id}', 'StoreController@superAdminStoreOrderPage');
    Route::get('/orderboard/store/{id}/edit', 'StoreController@superAdminModifyStoreOrderPage');
    Route::put('/orderboard/store/{id}', 'StoreController@updateOrder');
});

Route::group([
    'middleware' => 'designer',
    'prefix' => 'dashboard/designer'
], function() {
    Route::get('', 'PagesController@designerDashboard');
    Route::get('/order', 'PagesController@designerOrder');
});


// Route::group([
//     'middleware' => 'store', 
//     'prefix' => 'dashboard/store'
// ], function() {
//     Route::get('', 'PagesController@storeDashboard');
//     Route::get('/order', 'PagesController@storeOrder');
// });

Route::group([
    'middleware' => 'printing',
    'prefix' => 'dashboard/printing'
], function() {
    Route::get('', 'PagesController@printingDashboard');

    Route::get('/orders/commercial', 'PagesController@printingDisplayCommercialOrders');
    Route::get('/order/commercial/{id}', 'PagesController@printingDisplayCommercialOrder');

    Route::get('/personal/orders', 'PagesController@printingPersonalOrders');
    Route::get('/personal/order/{id}', 'PagesController@printingPersonalOrder');

    Route::get('/user/{id}', 'PagesController@printingDisplayUser');
});

Route::group([
    'middleware' => 'sales', 
    'prefix' => 'dashboard/sales'
], function() {
    Route::get('', 'PagesController@salesDashboard');
    Route::get('/users', 'PagesController@salesDisplayUsers');
    Route::get('/user/create', 'PagesController@salesCreateUser');
    Route::get('/user/{id}', 'PagesController@salesDisplayUser');

    Route::get('/user/{id}/createpreorder/{category}', 'SalesAdminController@createPreorderPage');
    
    Route::post('/user/create', 'SalesAdminController@createUser');
    Route::post('/user/{id}/createpreorder/{category}', 'SalesAdminController@createPreorder');

    Route::get('/reorders', 'SalesAdminController@reordersPage');
    Route::get('/reorder/{id}', 'SalesAdminController@reorderPage');
    Route::get('/reorder/{id}/edit', 'SalesAdminController@updateReorderPage');
    Route::put('/reorder/{id}', 'SalesAdminController@updateReorder');
    Route::get('/masterorders', 'SalesAdminController@masterordersPage');
    Route::get('/masterorder/{id}', 'SalesAdminController@masterorderPage');
    Route::post('/masterorder/{id}', 'SalesAdminController@updateMasterOrder');
    Route::get('/order/{token}', 'SalesAdminController@orderPage');
});

Route::group([
    'middleware' => 'store', 
    'prefix' => 'dashboard/store'
], function() {
    Route::get('', 'StoreController@storeDashboard');
    Route::get('/orders', 'StoreController@storeAdminStoreOrdersPage');
    Route::get('/order/{id}', 'StoreController@storeAdminStoreOrderPage');
    Route::put('/order/{id}', 'StoreController@updateOrder');

});



// Route::get('/dashboard', 'PagesController@dashboard');
// Route::get('/dashboard/users', 'PagesController@users');

// Route::get('/dashboard/addProfile', 'PagesController@addProfile');
// Route::get('/dashboard/editProfile/{id}', 'PagesController@editProfile');

// Route::get('/dashboard/databoard', 'PagesController@databoard');
// Route::get('/dashboard/databoard/addData/{id}', 'PagesController@addData');
// Route::get('/dashboard/databoard/editPackage/{id}', 'PagesController@editPackage');
// Route::get('/dashboard/databoard/editProduct/{id}', 'PagesController@editProduct');

// Route::post('/dashboard/databoard/addPackage', 'AdminController@addPackage');
// Route::put('/dashboard/databoard/editPackage/{id}', 'AdminController@editPackage');
// Route::delete('/dashboard/databoard/deletePackage', 'AdminController@deletePackage');

// Route::post('/dashboard/databoard/addProduct', 'AdminController@addProduct');
// Route::put('/dashboard/databoard/editProduct/{id}', 'AdminController@editProduct');
// Route::delete('/dashboard/databoard/deleteProduct', 'AdminController@deleteProduct');

// Route::post('/dashboard/users/setAdmin', 'AdminController@setAdmin');

// Route::post('/dashboard/addProfile', 'AdminController@addProfile');
// Route::put('/dashboard/editProfile/{id}', 'AdminController@editProfile');
// Route::delete('/dashboard/deleteProfile', 'AdminController@deleteProfile');

Route::get('/payment', 'PagesController@payment')->middleware(['auth', 'verified']);
Route::get('/confirm-order', 'PagesController@orderConfirm')->middleware('auth');

Route::get('/test', function() {
    return view('pages.test');
});

Route::get('/report/logo-design/{id}', 'ReportsController@logodesign');


// if(Auth::guest()) {
//     if(Auth::user()->admin) {
//         Route::get('/admin', function() {
//             return view('admin.dashboard');
//         });
//         Route::view('admin/users', 'admin.users');
//         Route::view('admin/orders', 'admin.orders');
//     }
    
    
// }

// Route::prefix('/admin')->group(function () {
//     if(Auth::guest()) {
//         return redirect('/home');
//     }
//     else {
//         if(Auth::user()->admin) {
//             Route::view('/dashboard','admin.dashboard');
//             Route::view('/orders', 'admin.orders');
//         }
//         else {
//             return redirect('/');
//         }
//     }
//     Route::get('/', function () {
//         return view('admin.dashboard');
//     });
//     Route::get('/orders', function() {
//         return view('admin.orders');
//     });
// });


// if(Auth::user()->admin) {
//     Route::get('/admin', function() {
//         return view('admin.dashboard');
//     });
// })

// Route::get('/storage/uploads/{any}', function($filename) {
//     echo asset('/storage/uploads/'.$filename);
// });

// Route::get('/design/{any}', function() {
//     return view('welcome');
// })->where('any', '.*');



Route::get('/lang/{locale}', 'LocalizationController@index');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');

