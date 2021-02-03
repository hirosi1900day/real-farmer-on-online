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
Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});
//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('agree', 'Auth\RegisterController@agree')->name('agree');
//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');

//管理者画面
Route::group(['middleware' => ['auth.admin']], function () {
    //管理者ホーム
    Route::get('/admin/home', 'Admin\LoginController@home')->name('admin.home');
    //管理者ようユーザー詳細
    Route::get('/admin/{id}/user/show', 'Admin\AdminController@userShow')->name('admin.user.show');
    //管理者ログアウト
    Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    //指示追加関連
    Route::get('/admin/adminField', 'Admin\InstructionController@adminField')->name('admin.adminField');
    Route::get('/admin/plantType', 'Admin\InstructionController@plantType')->name('admin.plantType');
    Route::get('/admin/instructons', 'Admin\InstructionController@instructons')->name('admin.instructons');
    Route::post('/admin/adminField/post', 'Admin\InstructionController@adminField_create')->name('admin.adminField.post');
    Route::post('/admin/plantType/post', 'Admin\InstructionController@plantType_create')->name('admin.plamtType.post');
    Route::post('/admin/instructons/post', 'Admin\InstructionController@instructons_create')->name('admin.instructons.post');
    //畑全体像
    Route::get('/admin/overallField/create', 'Admin\InstructionController@field_overall_create')->name('admin.overallField.create');
    Route::post('/admin/overallField/store', 'Admin\InstructionController@field_overall_store')->name('admin.overallField.store');
    Route::post('/admin/overallField/delete', 'Admin\InstructionController@field_overall_delete')->name('admin.overallField.delete');
    //指示関連削除
    Route::post('/admin/adminField/delete', 'Admin\InstructionController@adminField_delete')->name('admin.adminField.delete');
    Route::post('/admin/instruction/delete', 'Admin\InstructionController@instruction_delete')->name('admin.instruction.delete');
    Route::post('/admin/plantType/delete', 'Admin\InstructionController@plantType_delete')->name('admin.plantType.delete');
    //農作履歴書き込み
    Route::get('/admin/fieldHistoryWrite/{id}/create','Admin\AdminController@fieldHistoryWrite')->name('admin.fieldHistoryWrite');
    Route::post('/admin/fieldHistoryWrite/store','Admin\AdminController@fieldHistoryWriteStore')->name('admin.fieldhistoryWrite.create');
    Route::get('/admin/instructionHistoryWrite/{id}/create','Admin\AdminController@instructionHistoryWrite')->name('admin.instructionHistoryWrite');
    Route::post('/admin/instructionHistoryWrite/store','Admin\AdminController@instructionHistoryWriteStore')->name('admin.instructionHistoryWrite.create');
    Route::get('/admin/plantHistoryWrite/{id}/create','Admin\AdminController@plantHistoryWrite')->name('admin.plantHistoryWrite');
    Route::post('/admin/plantHistoryWrite/store','Admin\AdminController@plantHistoryWriteStore')->name('admin.plantHistoryWrite.create');
    //管理者日記書き込み
    Route::get('/admin/{id}/dailyCreate','Admin\AdminController@dailyCreate')->name('admin.dailyCreate');
    Route::post('/admin/dailyStore','Admin\AdminController@dailystore')->name('admin.dailyStore');
    //チャットユーザー一覧
    Route::get('chat/user_index', 'User\ChatController@admin_index')->name('chat.user_index');
    //request要望
    Route::get('user_request/index', 'User\RequestController@index')->name('user_request.index');
    Route::get('user_request/{id}/show', 'User\RequestController@show')->name('user_request.show');
    Route::get('user_request/{id}/delete', 'User\RequestController@delete')->name('user_request.delete');
    //point返還
    Route::get('admin/{id}/return_point_view', 'Admin\PointController@return_point_view')->name('admin.return_point_view');
    Route::post('admin/return_point_store', 'Admin\PointController@return_point_store')->name('admin.return_point_store');
    //新着情報作成フォーム
    Route::get('admin/information/create', 'User\InformationController@create')->name('admin.create.information');
    Route::post('admin/information/store', 'User\InformationController@store')->name('admin.store.information');
    
    
});
Route::group(['middleware' => ['auth','verified']], function () {
   Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
   //管理者よう
   Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
   Route::post('/admin/login/post', 'Admin\LoginController@login')->name('admin.login.post');
   //userMYpage
   Route::get('/user/mypage','User\UserController@mypage')->name('user.mypage');
   //user詳細
   Route::get('/user/{id}/show','User\UserController@show')->name('user.show');
   Route::get('/user/{user}/edit','User\UserController@edit')->name('user.edit');
   Route::put('user/{id}/update','User\UserController@update')->name('user.update');
   Route::get('/user/myfield','User\MenuController@myfield')->name('user.myfield');
   //メニュー追加
   Route::get('/user/instruction','User\MenuController@intruction')->name('user.instruction');
   Route::get('/user/field','User\MenuController@field')->name('user.field');
   Route::get('/user/plant','User\MenuController@plant')->name('user.plant');
   Route::post('/user/menu/instruction','User\MenuController@instructionAdd')->name('user.menu.instruction');
   Route::post('/user/menu/field','User\MenuController@fieldAdd')->name('user.menu.field');
   Route::post('/user/menu/plant','User\MenuController@plantAdd')->name('user.menu.plant');
   Route::get('/user/field_overall','User\MenuController@field_overall')->name('user.field_overall');
   //user日記関連
   Route::get('/user/dailyIndex','User\DailyController@index')->name('user.daily.index');
   Route::get('/user/{id}/show','User\DailyController@show')->name('user.daily.show');
   //決済関連
   Route::get('/user/pay/index','User\PayController@index')->name('user.pay.index')->middleware('verified');
   Route::post('/user/pay/payment','User\PayController@payment1000')->name('user.pay.payment1000');
   Route::post('/user/pay/payment3000','User\PayController@payment3000')->name('user.pay.payment3000');
   Route::post('/user/pay/payment5000','User\PayController@payment5000')->name('user.pay.payment5000');
   Route::get('/user/pay/complete','User\PayController@complete')->name('user.pay.complete');
   //チャット関連；
   Route::get('chat/{id}/show', 'User\ChatController@show')->name('chat.show');
   Route::get('chat/{id}/view', 'User\ChatController@view')->name('chat.view');
   Route::post('chat/{id}/store', 'User\ChatController@store')->name('chat.store');
   //これでチャットルームがなければ作成、あればチャットルームに移動(view)
   Route::get('chat/{id}/create_chatroom', 'User\ChatController@create_chatroom')->name('chat.create_chatroom');
   //コミュニティーチャット
   Route::get('community/show', 'User\CommunityChatController@show')->name('community.show');
   Route::get('community/view', 'User\CommunityChatController@view')->name('community.view');
   Route::post('community/store', 'User\CommunityChatController@store')->name('community.store');
   //request要望
   Route::get('user_request/create', 'User\RequestController@view')->name('user_request.create');
   Route::get('user_request/complete', 'User\RequestController@complete')->name('user_request.complete');
   Route::post('user_request/store', 'User\RequestController@store')->name('user_request.store');
   //新着情報
   Route::get('user/information/index', 'User\InformationController@index');
  
   
   
   
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
