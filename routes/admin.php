<?php
/**
 * Created by PhpStorm.
 * User: crisen
 * Date: 18-4-12
 * Time: 下午4:45
 */


//auth
Auth::routes();


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
    Route::group(['middleware' => 'role:root|Admin'], function () {

        Route::resource('menu', 'Basic\MenuController');
        Route::get('settings', 'Basic\SettingsController@index')->name('settings');
    });


    Route::group(['middleware' => 'role:root|Admin|editor'], function () {
        //content
        Route::resource('category', 'Content\CategoryController');
        Route::resource('post', 'Content\PostController');
    });


    //personal
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::get('profile/edit', 'ProfileController@profile')->name('profile.edit');
    Route::post('profile', 'ProfileController@saveProfile')->name('profile.save');
    Route::post('profile/password', 'ProfileController@changePassword')->name('password.change');

    //common
    Route::get('home', 'Personal\HomeController@index')->name('admin.home');
    Route::get('/', 'Personal\HomeController@index')->name('admin.index');

});
