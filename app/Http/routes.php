<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$router->get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

$router->controller('auth', 'AuthController');

$router->get('/about', function()
{
    return View::make('about');
});

$router->get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
$router->post('/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));

$router->get('/logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

$router->get('/signup', 'AuthController@getRegister');
$router->post('/signup', array('as' => 'signup', 'uses' => 'AuthController@postRegister'));

$router->controller('password', 'PasswordController');

$router->resource('lists', 'ListsController');