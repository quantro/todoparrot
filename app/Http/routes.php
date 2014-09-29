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

get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

get('/about', function()
{
  return View::make('about');     
}); 

post('lists/{lists}/tasks/{tasks}/complete', array('as' => 'complete_task', 'uses' => 'TasksController@complete')); 
Route::resource('lists', 'ListsController');
Route::resource('lists.tasks', 'TasksController');

# Authorization routes

get('/login', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
post('/login', array('as' => 'login', 'uses' => 'AUth\AuthController@postLogin'));

get('/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@getLogout'));

get('/signup', 'Auth\AuthController@getRegister');
post('/signup', array('as' => 'signup', 'uses' => 'Auth\AuthController@postRegister'));

Route::resource('users', 'UsersController');
