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
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/dashboard', 'PagesController@dashboardPage');
Route::get('/dashboard/users', 'PagesController@usersPage');

Route::get('/dashboard/addProfile', 'PagesController@addProfilePage');
Route::get('/dashboard/editProfile', 'PagesController@editProfilePage');

Route::post('/dashboard/users/setAdmin', 'AdminController@setAdmin');

Route::post('/dashboard/addProfile', 'AdminController@addProfile');
Route::put('/dashboard/editProfile', 'AdminController@editProfile');
Route::delete('/dashboard/deleteProfile', 'AdminController@deleteProfile');




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


Route::get('/design/{any}', function() {
    return view('welcome');
})->where('any', '.*')->middleware('verified');



Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');

