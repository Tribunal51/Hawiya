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
    Route::get('/data/commercial/items', 'PagesController@commercialItems');
    Route::get('/data/commercial/item/{id}', 'PagesController@commercialItem');

    Route::get('/data/personal/items', 'PagesController@adminDisplayPersonalItems');
    Route::get('/data/personal/item/{id}', 'PagesController@adminDisplayPersonalItem');

    Route::get('/orderboard/commercial', 'PagesController@commercialOrderboard');
    Route::get('/orderboard/commercial/{id}', 'PagesController@commercialOrder');
    Route::put('/orderboard/commercial/{id}', 'AdminController@editCommercialOrder');

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

    Route::post('/data/commercial/item', 'AdminController@addCommercialItem');
    Route::delete('/data/commercial/items', 'AdminController@deleteCommercialItems');

    Route::post('/data/personal/item', 'AdminController@addPersonalItem');
    Route::delete('/data/personal/items', 'AdminController@deletePersonalItems');
    Route::post('/data/personal/item/{id}/subitem', 'AdminController@addPersonalSubitem');
    Route::delete('/data/personal/subitems', 'AdminController@deletePersonalSubitems');

    
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

    Route::post('/user/create', 'SalesAdminController@createUser');
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

