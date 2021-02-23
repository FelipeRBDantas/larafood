<?php

Route::post('/auth/register', 'Api\Auth\RegisterController@store');
Route::post('/auth/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    Route::get('/auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');

    Route::post('/auth/v1/orders/{identify}/evaluations', 'Api\EvaluationController@store');

    Route::get('/auth/v1/my-orders', 'Api\OrderController@myOrders');
    Route::post('/auth/v1/orders', 'Api\OrderController@store');
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){
    Route::get('/tenants/{uuid}', 'TenantController@show');
    Route::get('/tenants', 'TenantController@index');
    
    Route::get('/categories/{identify}', 'CategoryController@show');
    Route::get('/categories', 'CategoryController@categoriesByTenant');
    
    Route::get('/tables/{identify}', 'TableController@show');
    Route::get('/tables', 'TableController@tablesByTenant');
    
    Route::get('/products/{identify}', 'ProductController@show');
    Route::get('/products', 'ProductController@productsByTenant');

    Route::post('/orders', 'OrderController@store');
    Route::get('/orders/{identify}', 'OrderController@show');
});