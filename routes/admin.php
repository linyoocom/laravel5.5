<?php

Route::group([],function(){
    App::setLocale('cn');

    Route::get('index', function () {
        return view('welcome');
    });

    Route::get('login', 'AdminAuth\LoginController@loginPage')->name('adminLogin');
    Route::post('login', 'AdminAuth\LoginController@login');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('adminLogout');

    // Registration Routes...
    Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminRegister');
    Route::post('register', 'AdminAuth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('adminPassword.request');
    Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('adminPassword.email');
    Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('adminPassword.reset');
    Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');

});
