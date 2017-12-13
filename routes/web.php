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

//auth
Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    //core
    Route::resource('user', 'Core\UserController');
    Route::resource('module', 'Core\ModuleController');
    Route::resource('role', 'Core\RoleController');
    Route::resource('permission', 'Core\PermissionController');

    
    //basic
    Route::resource('menu', 'Basic\MenuController');
    Route::get('settings', 'Basic\SettingsController@index')->name('settings');


    //common
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('home', 'HomeController@index')->name('home');

    //content
    Route::resource('category', 'Content\CategoryController');
    Route::resource('post', 'Content\PostController');

    //personal
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::get('profile/edit', 'ProfileController@profile')->name('profile.edit');
    Route::post('profile', 'ProfileController@saveProfile')->name('profile.save');
    Route::post('profile/password', 'ProfileController@changePassword')->name('password.change');


});
