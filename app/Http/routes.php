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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/about', function()
{
  return View::make('about');     
}); 

Route::post('lists/{lists}/tasks/{tasks}/complete', array('as' => 'complete_task', 'uses' => 'TasksController@complete')); 
Route::resource('lists', 'ListsController');
Route::resource('lists.tasks', 'TasksController');

Route::get('/login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'process_login', 'uses' => 'UsersController@processLogin'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::resource('users', 'UsersController');

