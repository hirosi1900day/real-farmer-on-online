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
    Route::get('/admin/home', 'Admin\LoginController@home')->name('admin.home');
    Route::get('/admin/{id}/user/show', 'Admin\AdminController@userShow')->name('admin.user.show');
    Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/admin/adminField', 'Admin\InstructionController@adminField')->name('admin.adminField');
    Route::get('/admin/plantType', 'Admin\InstructionController@plantType')->name('admin.plantType');
    Route::get('/admin/instructons', 'Admin\InstructionController@instructons')->name('admin.instructons');
    Route::post('/admin/adminField/post', 'Admin\InstructionController@adminField_create')->name('admin.adminField.post');
    Route::post('/admin/plantType/post', 'Admin\InstructionController@plantType_create')->name('admin.plamtType.post');
    Route::post('/admin/instructons/post', 'Admin\InstructionController@instructons_create')->name('admin.instructons.post');
    Route::get('/admin/fieldHistoryWrite/{id}/create','Admin\AdminController@fieldHistoryWrite')->name('admin.fieldHistoryWrite');
    Route::post('/admin/fieldHistoryWrite/store','Admin\AdminController@fieldHistoryWriteStore')->name('admin.historyWrite.create');
});
Route::group(['middleware' => ['auth']], function () {
   Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
   //管理者よう
   Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
   Route::post('/admin/login/post', 'Admin\LoginController@login')->name('admin.login.post');
   //user
   Route::get('/user/mypage','User\UserController@mypage')->name('user.mypage');
   Route::get('/user/{id}/show','User\UserController@show')->name('user.show');
   Route::get('/user/edit','User\UserController@edit')->name('user.edit');
   Route::put('user/{id}/update','User\UserController@update')->name('user.update');
   Route::get('/user/myfield','User\MenuController@myfield')->name('user.myfield');
   Route::get('/user/instruction','User\MenuController@intruction')->name('user.instruction');
   Route::get('/user/field','User\MenuController@field')->name('user.field');
   Route::get('/user/plant','User\MenuController@plant')->name('user.plant');
   Route::post('/user/menu/instruction','User\MenuController@instructionAdd')->name('user.menu.instruction');
   Route::post('/user/menu/field','User\MenuController@fieldAdd')->name('user.menu.field');
   Route::post('/user/menu/plant','User\MenuController@plantAdd')->name('user.menu.plant');
   //決済関連
   Route::get('/user/pay/index','User\PayController@index')->name('user.pay.index');
   Route::post('/user/pay/payment','User\PayController@payment')->name('user.pay.payment');
   Route::get('/user/pay/complete','User\PayController@complete')->name('user.pay.complete');
   
});

