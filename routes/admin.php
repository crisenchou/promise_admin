<?php
/**
 * Created by PhpStorm.
 * User: crisen
 * Date: 18-4-12
 * Time: 下午4:45
 */


//auth
Auth::routes();


//common
Route::get('/', 'Personal\HomeController@index')->name('index');
Route::get('home', 'Personal\HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    //core
    Route::group(['middleware' => 'role:root'], function () {
        Route::put('user/{id}/status', 'Core\UserController@status')->name('user.status');
        Route::resource('user', 'Core\UserController');

        Route::resource('module', 'Core\ModuleController');
        Route::resource('role', 'Core\RoleController');
        Route::resource('permission', 'Core\PermissionController');
    });

    //basic
    Route::group(['middleware' => 'role:root|admin'], function () {

        Route::resource('menu', 'Basic\MenuController');
        Route::get('settings', 'Basic\SettingsController@index')->name('settings');
    });


    Route::group(['middleware' => 'role:root|admin|editor'], function () {
        //content
        Route::resource('category', 'Content\CategoryController');
        Route::resource('post', 'Content\PostController');
    });


    //personal
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::get('profile/edit', 'ProfileController@profile')->name('profile.edit');
    Route::post('profile', 'ProfileController@saveProfile')->name('profile.save');
    Route::post('profile/password', 'ProfileController@changePassword')->name('password.change');


});
