<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('profile');
});
*/






//login and register page
Route::get('/', 'AppController@login');
//forms
Route::post('/login', 'AppController@loginform');
Route::post('/reg', 'AppController@regform');








//profile page
Route::get('/profile', 'AppController@profile');
//send Point
Route::post('/sendP', 'AppController@sendP');










