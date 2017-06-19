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

/*
| Login / Logout
*/

$login = 'Auth\LoginController@';

Route::get('/', $login. 'showLoginForm')
    ->name('login');

Route::post('/', $login. 'login');

Route::get('logout', $login. 'logout')
    ->name('logout');

/*
| Password reset
*/

$forgotPasswordWeb = 'Auth\ForgotPasswordController@';
$passwordReset = 'Auth\ResetPasswordController@';

Route::post('password/reset', $forgotPasswordWeb.'sendResetLinkEmail')->name('password.email');
Route::post('wachtwoord/reset/{token}', $passwordReset.'reset')->name('password.reset');
Route::get('wachtwoord/reset/{token}', $passwordReset.'showResetForm');

/*
| Register
*/

Route::get('registreer', 'Auth\RegisterController@show')->name('register.show');
Route::post('registreer', 'Auth\RegisterController@register');

/*
| Info controller
*/

Route::get('info', 'Info\InfoController@info')
    ->name('info.info');

Route::group(['middleware' => ['auth', 'throttle:100', 'CheckIfApplicationIsActive']], function () {
    Route::get('dashboard', function () {
        return view('dashboard/dashboard');
    })->name('dashboard');

    /*
    | Settings
    */

    Route::get('instellingen/administratie', 'Settings\SettingsAdministrationController@index')
        ->name('settings.administration');
    Route::patch('instellingen/administratie', 'Settings\SettingsAdministrationController@update');

    Route::get('instellingen/locatie', 'Settings\SettingsLocationController@index')
        ->name('settings.location');
    Route::patch('instellingen/locatie', 'Settings\SettingsLocationController@update');

    Route::get('instellingen/profiel', 'Settings\SettingsProfileController@index')
        ->name('settings.profile');
    Route::patch('instellingen/profiel', 'Settings\SettingsProfileController@update');

    Route::get('instellingen/gebruik', 'Settings\SettingsUsageController@index')
        ->name('settings.usage');
    Route::patch('instellingen/gebruik', 'Settings\SettingsUsageController@update');
});
