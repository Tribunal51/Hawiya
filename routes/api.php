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




Route::get('/users', 'UsersController@index');
Route::get('/user', 'UsersController@show');
Route::get('/user/login', 'UsersController@login');
Route::post('/user', 'UsersController@store');
Route::put('/user', 'UsersController@update');
Route::delete('/user', 'UsersController@destroy');


Route::get('/profiles', 'ProfilesController@index');
Route::post('/profile', 'ProfilesController@store');
Route::get('/profiles/filter', 'ProfilesController@filter');



Route::get('/orders', 'OrdersController@index');
Route::get('/orders/getUserOrder', 'OrdersController@getUserOrder');
Route::get('/orders/getAllOrders', 'OrdersController@getAllOrders');

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





