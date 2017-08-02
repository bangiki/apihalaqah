<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return 'welcome to restful api halaqah depok v1';
});

$app->group(['prefix'=>'api/v1'], function() use ($app){
    $app->post('/auth/login', 'AuthController@login');
    $app->post('/auth/register', 'AuthController@register');
});

$app->group(['prefix'=>'api/v1','middleware'=>'auth'], function() use ($app){
    $app->get('/users', 'ExampleController@getAllUser');
    $app->get('/members/{kelas}', 'MemberController@getAllMember');
});


