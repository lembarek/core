<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
    'as' => 'core:home',
    'uses' => 'Lembarek\Core\Controllers\HomeController@home',
    ]);
});
