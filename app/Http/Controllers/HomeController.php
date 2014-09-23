<?php namespace todoparrot\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@index');
	|
	*/

	public function index()
  {
    
    $tasks = \todoparrot\Todolist::all();
        $data = array('username' => 'wjgilmore',
                    'date' => date('Y-m-d'));                                                                                                                                   
     
            return view('hello')->with('name', 'San Juan Vacation')->with('date', '2014-09-16');
	}

}
