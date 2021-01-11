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

//管理者画面
Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('/admin/aa', 'Admin\LoginController@aa')->name('admin.aa');
    Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/admin/adminField', 'Admin\InstructionController@adminField')->name('admin.adminField');
    Route::get('/admin/plantType', 'Admin\InstructionController@plantType')->name('admin.plantType');
    Route::get('/admin/instructons', 'Admin\InstructionController@instructons')->name('admin.instructons');
    Route::post('/admin/adminField/post', 'Admin\InstructionController@adminField_create')->name('admin.adminField.post');
    Route::post('/admin/plantType/post', 'Admin\InstructionController@plantType_create')->name('admin.plamtType.post');
    Route::post('/admin/instructons/post', 'Admin\InstructionController@instructons_create')->name('admin.instructons.post');
});
Route::group(['middleware' => ['auth']], function () {
   Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
   Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
   Route::post('/admin/login/post', 'Admin\LoginController@login')->name('admin.login.post');
   Route::get('/user/mypage','User\UserController@mypage')->name('user.mypage');
   Route::get('/user/edit','User\UserController@edit')->name('user.edit');
   Route::put('user/{id}/update','User\UserController@update')->name('user.update');
   Route::get('/user/instruction','\User\MenuController@intruction')->name('user.instruction');
   Route::get('/user/field','\User\MenuController@field')->name('user.field');
   Route::get('/user/plant','\User\MenuController@plant')->name('user.plant');
   
});

