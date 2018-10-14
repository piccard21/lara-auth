<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/users', function () {
//     if (rand(1, 10) < 3) {
//         abort(500, 'We could not retrieve the users');
//     }
//     return factory('App\User', 10)->make();
// });

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Api',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('users', 'UsersController@index');
    });
});

// http://127.0.0.1:8000/api/auth/login?email=222@aaa.aa&password=222222&remember_me=1
//
