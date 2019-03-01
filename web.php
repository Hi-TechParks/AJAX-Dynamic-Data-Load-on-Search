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


	// Training faq admin routes
	Route::get('/admin/faq/{id}/changestatus','AdminTrainingFAQController@changeStatus')->name('faq.status');
	Route::resource('/admin/faq','AdminTrainingFAQController');

	/*Route::post('/admin/faq/number','AdminTrainingFAQController@profaqsno');
	Route::post('/getmsg','AjaxController@index');*/

	Route::post('/admin/faq/number','AjaxController@store');

