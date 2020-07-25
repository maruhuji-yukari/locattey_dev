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

Route::get('/', function () {
    return view('index');
});

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();


Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('showRegister');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::get('login','Auth\LoginController@showLoginForm')->name('showLogin');
Route::post('login','AUth\LoginController@login')->name('login');


//認証必要なページにミドルウェア
Route::group(['middleware' => 'auth'],function(){
    Route::post('logout','Auth\LoginController@logout')->name('logout');

    Route::get('member/trade/register','Member\ProductsController@new')->name('tradeRegister');
    Route::post('member/trade/register','Member\ProductsController@create')->name('tradeCreate');

    Route::get('member/trade/list','Member\ProductsController@list')->name('tradeList');

    Route::get('member/trade/{id}/edit','Member\ProductsController@edit')->name('tradeEdit');
    Route::post('member/trade/{id}/update','Member\ProductsController@update')->name('tradeUpdate');

    Route::get('member_trade/{id}/editImages','Member\ProductsController@editImage')->name('editImage');
    Route::post('member_trade/{id}/editUploads','Member\ProductsController@editUploads')->name('editUploads');

    Route::get('member/mypage','Member\MypageController@index')->name('mypage');
    Route::post('member/mypage','Member\MypageController@upload')->name('profUpload');

    Route::get('member/register/edit','Member\MypageController@edit')->name('memberEdit');
    Route::post('member/register/update','Member\MypageController@update')->name('memberUpdate');

    Route::get('member/remove/{id}','Member\ProductsController@remove')->name('tradeRemove');
    Route::post('member/delete/{id}','Member\ProductsController@delete')->name('tradeDelete');

    Route::get('member/delete_preview','Member\MypageController@preview')->name('deletePreview');
    Route::post('member/delete',"Member\MypageController@delete")->name('deleteMember');

    Route::get('member/bidItem/{id}','Member\BidController@showBidItem')->name('BidItem');
    Route::post('member/detailBidItem/{id}','Member\BidController@bidItem')->name('detailBidItem');

    Route::post('trade/change/{id}','Member\BidsController@bid')->name('bidUpdate');
});

Route::get('trade/{id}','Member\BidsController@simple')->name('tradeSimple');

Route::get('auth/confirm','Auth\ConfirmPasswordController@showConfirmForm')->name('showConfirmForm');
Route::post('auth/confirm','Auth\ConfirmPasswordController@confirm')->name('password.confirm');

Route::get('/password/sendEmail','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email.send');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('showResetForm');
Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/contact','ContactController@show')->name('contact');
Route::post('/contact/confirm','ContactController@confirm')->name('confirm');
Route::post('/contact/send','ContactController@send')->name('send');

//管理人画面関係
//未ログイン
Route::get('/admin/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Admin\Auth\LoginController@login')->name('admin.login');
Route::get('/admin/register','Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register','Admin\Auth\RegisterController@register')->name('admin.register');
Route::get('/admin/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestFormAdmin')->name('admin.password.email.send');
Route::post('/admin/password/reset/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');


//ログイン
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('/home','Admin\HomeController@index')->name('admin.home');
    Route::post('logout','Admin\Auth\LoginController@logout')->name('admin.logout');
});
