<?php

use App\Http\Controllers\Admin\MessageController;
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
    return view('welcome');
});

// Register user.
Route::get('signup', 'SignUpController@index')->name('signup.index');
Route::post('signup', 'SignUpController@postIndex');
Route::get('signup/confirm', 'SignUpController@confirm')->name('signup.confirm');
Route::post('signup/confirm', 'SignUpController@postConfirm');
Route::get('signup/thanks', 'SignUpController@thanks')->name('signup.thanks');

// Admin.
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function() {
    Route::middleware('guest:admin')->group(function() {
        // Login View.
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });

    Route::middleware('auth:admin')->group(function() {
        // Logout.
        Route::get('logout', 'LoginController@logout')->name('logout');

        // Admin Top View.
        Route::get('', 'IndexController@index')->name('top');

        // Message management.
        Route::get('message', 'MessageController@index')->name('message.index');
        Route::get('message/create', 'MessageController@create')->name('message.create');
        Route::post('message/create', 'MessageController@store');
        Route::get('message/edit/{message}', 'MessageController@edit')->name('message.edit');
        Route::post('message/edit/{message}', 'MessageController@update')->name('message.update');

        // User management.
        Route::get('user', 'UserController@index')->name('user.index');
        Route::delete('user/destroy/{user}', 'UserController@destroy')->name('user.destroy');
    });
});

// User.
Route::prefix('user')->namespace('User')->as('user.')->group(function() {
    Route::middleware('guest:user')->group(function() {
        // Login View.
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });

    Route::middleware('auth:user')->group(function() {

        // User Top View.
        Route::get('', 'IndexController@index')->name('top');
        // Logout.
        Route::get('logout', 'LoginController@logout')->name('logout');

        // Update profile.
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/edit', 'ProfileController@update');

        // Show messages.
        Route::get('message', 'MessageController@index')->name('message.index');
        Route::get('message/show/{message}', 'MessageController@show')->name('message.show');
    });
});
