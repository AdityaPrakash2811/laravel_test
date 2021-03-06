<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * For JWT
 */
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::post('/logout',  'App\Http\Controllers\AuthController@logout');
    Route::post('/refresh',  'App\Http\Controllers\AuthController@refresh');
    Route::get('/user-profile', 'App\Http\Controllers\AuthController@userProfile');    
});

Route::group([
    'middleware' => 'api'

], function ($router) {
    Route::resource('users', 'App\Http\Controllers\UserController'); 
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    /*$api->get('test', function () {
        return 'It is ok';
    });;*/

    $api->group(['namespace' => 'App\Http\Controllers'], function ($api) {
        $api->resource('users','UserController');
    });
});


