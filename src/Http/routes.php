<?php

Route::resource('ussd', 'UssdController@index');
Route::group(['namespace' => 'leyo\rapidussd'], function () {
//    Route::resource('ussd', 'UssdController@index');
});