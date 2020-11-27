<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;    //------------JWT--------------------
use App\Http\Controllers\AuthController;    //--------JWT------------
use App\Http\Controllers\UserController;
use Illuminate\Http\UploadedFile;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',function(){
    return view('home');
});

Route::post('/upload',function(Request $request){
    $request->image->store('images','public');
    return 'uploaded';
});

Route::post('/s3upload',function(Request $request){
    $request->image->store('images','s3');
    return 'uploaded';
});







