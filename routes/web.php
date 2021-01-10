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

Route::get('/', function () {
    return view('welcome');
});
//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function () {
   Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
   Route::post('/admin/login/post', 'Admin\LoginController@login')->name('admin.login.post');
});
//管理者画面
Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('/admin/aa', 'Admin\LoginController@aa')->name('admin.aa');
    Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
});

