<?php


Route::group(['namespace' => 'Api'], function () {
    Route::name('api.login')->post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');


    Route::apiResource('courses', 'CourseController');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', 'AuthController@logout');

        // Route::group(['middleware' => 'jwt.refresh'], function () { });

        Route::post('/user', 'UserController@show');
        Route::put('/user/{user}', 'UserController@update');
        Route::put('/user/password/{course}', 'UpdatePasswordController@update');



        Route::get('categories/{category}/bill_pays', 'CategoryBillPayController@index');
        Route::resource('categories', 'CategoryController', ['except' => ['create', 'edit']]);
        Route::resource('bill_pays', 'BillPayController', ['except' => ['create', 'edit']]);


        Route::apiResource('users', 'UsersController');
        Route::apiResource('categories', 'CategoryController');
        Route::apiResource('lessons', 'LessonController');
        Route::apiResource('managers', 'ManagerController');


    });
});
