<?php

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;

/*
|--------------------------------------------------------------------------
| API Routes
|-----------------------------;--------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', function(Request $request) {
//     return $request->user();
// });

// Route::get('/user/{id}', function($id) {
//     $user = User::find($id);
//     return $user;
//     //return new UserResource($user);
// });



// Route::group(['middleware' => ['api_token']], function() {

    Route::get('/users', 'UsersController@index');
    Route::get('/user', 'UsersController@show');
    Route::get('/user/login', 'UsersController@login');
    Route::post('/user/login/google', 'UsersController@googleLogin');
    Route::post('/user', 'UsersController@store');
    Route::put('/user', 'UsersController@update');
    Route::delete('/user', 'UsersController@destroy');
    Route::get('/user/{id}/issues', 'UsersController@issues');


    Route::get('/profiles', 'ProfilesController@index');
    Route::get('/profile', 'ProfilesController@show');
    Route::post('/profile', 'ProfilesController@store');
    Route::get('/profiles/filter', 'ProfilesController@filter');



    Route::get('/orders', 'OrdersController@index');
    Route::get('/orders/getUserOrders/{id}', 'OrdersController@getUserOrders');
    Route::get('/orders/getAllOrders', 'OrdersController@getAllOrders');
    Route::get('/orders/getUserOrdersSorted/{id}', 'OrdersController@getUserOrdersSortedByDate');

    Route::get('/orders/logo-design', 'LogoDesignOrdersController@index');
    Route::put('/orders/logo-design', 'LogoDesignOrdersController@update');
    Route::post('/orders/logo-design', 'LogoDesignOrdersController@store');
    Route::delete('/orders/logo-design', 'LogoDesignOrdersController@destroy');

    // Route::get('/uploads/{filename}', function ($filename)
    // {
    //     $path = app_path('uploads') . '/' . $filename;

    //     $file = File::get($path);
    //     $type = File::mimeType($path);

    //     $response = Response::make($file, 200);
    //     $response->header("Content-Type", $type);

    //     return $response;
    // });

    Route::get('/query', 'QueriesController@index');
    Route::post('/query', 'QueriesController@store');

    Route::get('/orders/branding', 'BrandingOrdersController@index');
    Route::post('/orders/branding', 'BrandingOrdersController@store');

    Route::get('/orders/social-media', 'SocialMediaOrdersController@index');
    Route::post('/orders/social-media', 'SocialMediaOrdersController@store');

    Route::get('/orders/stationery', 'StationeryOrdersController@index');
    Route::post('/orders/stationery', 'StationeryOrdersController@store');

    Route::get('/orders/packaging', 'PackagingOrdersController@index');
    Route::post('/orders/packaging', 'PackagingOrdersController@store');

    Route::get('/orders/promotional', 'PromotionalOrdersController@index');
    Route::post('/orders/promotional', 'PromotionalOrdersController@store');

    Route::get('/issues', 'IssuesController@index');
    Route::get('/issue/{id}', 'IssuesController@show');
    Route::get('/issues/user/{id}', 'IssuesController@userIssues');
    Route::post('/issue', 'IssuesController@store');

    Route::post('/push/user', 'PushNotificationsController@pushToUser');

    Route::post('/data/category', 'DataController@addCategories');

    
    
    Route::get('/data/packages/category/{id}', 'DataController@getPackagesByCategory');
    Route::get('/data/package/{id}', 'DataController@getPackage');
    Route::get('/data/packages', 'DataController@getAllPackages');
    Route::post('/data/package', 'DataController@addPackage');

    Route::get('/data/products/category/{id}', 'DataController@getProductsByCategory');
    Route::get('/data/product/{id}', 'DataController@getProduct');
    Route::get('/data/products', 'DataController@getAllProducts');
    Route::post('/data/product', 'DataController@addProduct');

    Route::get('/businesscards/designs', 'BusinessCardsController@index');
    Route::get('/businesscards/design', 'BusinessCardsController@design');

    Route::get('/data/commercial/items', 'CommercialItemsController@index');
    Route::get('/data/commercial/item/{id}', 'CommercialItemsController@show');
    Route::get('/orders/commercial', 'CommercialOrdersController@index');
    Route::get('/orders/commercial/{id}', 'CommercialOrdersController@show');
    Route::post('/orders/commercial', 'CommercialOrdersController@store');
    
// });

Route::group([   
    'middleware' => 'api',
    'prefix' => 'password'
], function() {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

// Route::post('password/create', 'PasswordResetController@create');




