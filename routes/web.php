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

    Route::get('member/{id}/remove','Member\ProductsController@remove')->name('tradeRemove');
    Route::post('member/{id}/delete','Member\ProductsController@delete')->name('tradeDelete');

    Route::get('member/delete_preview','Member\MypageController@preview')->name('deletePreview');
    Route::post('member/delete',"Member\MypageController@delete")->name('deleteMember');
});

Route::get('auth/confirm','Auth\ConfirmPasswordController@showConfirmForm')->name('showConfirmForm');
Route::post('auth/confirm','Auth\ConfirmPasswordController@confirm')->name('password.confirm');

Route::get('/password/sendEmail','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email.send');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('showResetForm');
Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('password.update');

Route::get('trade/{id}','HomeController@simple')->name('tradeSimple');

Route::get('/contact','ContactController@show')->name('contact');
