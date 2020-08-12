<?php

Route::group(['namespace'=>'Admin'],function(){
    App::setLocale('cn');

    Route::get('index', function () {
        return view('welcome');
    });

    Route::get('login', 'LoginController@loginPage')->name('adminLogin');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('adminLogout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('adminRegister');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('adminPassword.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('adminPassword.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('adminPassword.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});
