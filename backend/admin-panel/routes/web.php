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

// root
Route::get('/', 'Dashboard@index');
Route::get('/logout', 'Dashboard@logout');

// register route
Route::get('/register', 'Register@index');
Route::post('/register/store', 'Register@store');

// login route
Route::get('/login', 'Login@index');
Route::post('/login/check', 'Login@check');

// dashboard route
Route::get('/dashboard', 'Dashboard@index');

// user route
Route::get('/user', 'User@index');
Route::post('/add_user', 'User@add');
Route::get('/user-status/{id}/{status}', 'User@status');
Route::post('/edit-user', 'User@edit');
Route::get('/delete-user/{id}', 'User@delete');

// profile
Route::get('/profile', 'Profile@index');
Route::post('/personal-update', 'Profile@personal_update');
Route::post('/password-update', 'Profile@password_update');

