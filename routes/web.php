<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('boardrooms/destroy', 'BoardroomsController@massDestroy')->name('boardrooms.massDestroy');

    Route::resource('boardrooms', 'BoardroomsController');

    Route::delete('resources/destroy', 'ResourcesController@massDestroy')->name('resources.massDestroy');

    Route::resource('resources', 'ResourcesController');

    Route::delete('bookings/destroy', 'BookingsController@massDestroy')->name('bookings.massDestroy');

    Route::resource('bookings', 'BookingsController');
});
