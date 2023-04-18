<?php

Route::group(['prefix' => '', 'middleware' => []], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

