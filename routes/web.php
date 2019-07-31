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
Auth::routes();
//Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'PagesController@userDashboard')->name('home')->middleware('auth');


Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/dashboard/users', 'PagesController@users');

Route::get('/dashboard/addProfile', 'PagesController@addProfile');
Route::get('/dashboard/editProfile', 'PagesController@editProfile');

Route::post('/dashboard/users/setAdmin', 'AdminController@setAdmin');

Route::post('/dashboard/addProfile', 'AdminController@addProfile');
Route::put('/dashboard/editProfile', 'AdminController@editProfile');
Route::delete('/dashboard/deleteProfile', 'AdminController@deleteProfile');

Route::get('/payment', 'PagesController@payment')->middleware('auth');
Route::get('/confirm-order', 'PagesController@orderConfirm')->middleware('auth');
Route::get('/test', function() {
    return view('pages.test');
});

Route::get('/report/{id}', 'PagesController@report');


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

Route::get('/design/{any}', function() {
    return view('welcome');
})->where('any', '.*');



 


Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');

