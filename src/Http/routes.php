<?php

Route::resource('rapidussd', 'UssdController@index');
Route::group(['namespace' => 'leyo\rapidussd'], function () {
//    Route::resource('ussd', 'UssdController@index');
});