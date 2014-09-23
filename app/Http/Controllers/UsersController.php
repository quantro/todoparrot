<?php namespace todoparrot\Http\Controllers;

use todoparrot\Http\Requests\UserLoginFormRequest;
use todoparrot\Http\Requests\UserFormRequest;
use Illuminate\Routing\Controller;
use Response;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
	  return view('users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
    return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store(UserFormRequest $request)
  {

      \todoparrot\User::create(array(
        'first_name' => \Input::get('first_name'),
        'last_name' => \Input::get('last_name'),
        'email' => \Input::get('email'),
        'password' => \Hash::make(\Input::get('password'))
      ));

      return \Redirect::route('home')->with('message', 'You are now registered! Please login.'); 
  
  }

  /**
   * Present user login form
   *
   */ 
  public function login()
  {
    return view('users.login');
  }

  /**
   * Process user login form
   *
   */ 
  public function processLogin(UserLoginFormRequest $request)
  {

      $userdata = array(
        'email'   => \Input::get('email'),
        'password'  => \Input::get('password')
      );

      if (\Input::get('remember') == true)
      {
        $remember = true;
      } else {
        $remember = false;
      }

      if (\Auth::attempt($userdata, $remember)) {

        return \Redirect::route('home')->with('message', 'You have successfully signed in.'); 

      } else {

        return \Redirect::route('login')->with('message', 'Could not sign you into the system');

      }

  }

  /**
   * Logout
   *
   */
  public function logout()
  {
    \Auth::logout();
    return \Redirect::to('login');
  }

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $user = \todoparrot\User::find($id);
    return view('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
