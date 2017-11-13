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

class IpFilter
{
	private $ip;
	function __construct($ip)
	{
		return $this->ip = $ip;
	}
}


App::bind('IpFilter', function($app){
	return new IpFilter($app->make('request')->getClientIp());
});

App::bind('App\CacheInterface', 'App\CacheFile');

Route::get('/ip', function(IpFilter $ipfilter){

	dd($ipfilter);

});

Route::get('/cache', function(\App\CacheInterface $cache){
	dd($cache);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	Route::get('/dashboard/{id}', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('/form/{id?}', 'Admin\AdminController@form')->name('admin.form');
	Route::get('/ui-element/{id?}', 'Admin\AdminController@uiElements')->name('admin.ui.element');
	Route::get('/table/{id?}', 'Admin\AdminController@table')->name('admin.table');
	Route::get('/chart/{id?}', 'Admin\AdminController@chart')->name('admin.chart');
	//Route login
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	//Password reset routes
	Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

