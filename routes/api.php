<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('boardrooms', 'BoardroomsApiController');

    Route::apiResource('resources', 'ResourcesApiController');

    Route::apiResource('bookings', 'BookingsApiController');
});
