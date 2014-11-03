<?php namespace todoparrot\Http\Controllers;

use todoparrot\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use todoparrot\Http\Requests\RegisterRequest;
use todoparrot\User;

class AuthController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'logout']);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function postRegister(RegisterRequest $request)
	{

        $formInput = $request->input();

        $user = User::create([
            'first_name' => $formInput['first_name'],
            'last_name' => $formInput['last_name'],
            'email' => $formInput['email'],
            'password' => \Hash::make($formInput['password'])
        ]);


		$this->auth->login($user);

		return redirect('/')->with('message', 'Thank you for registering!');
	}

	/**
	 * Show the application login form.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{

        // The remember input is not passed through the
        // request. Is there a better way to retrieve this value?
        if (\Input::get('remember') == true)
        {
            $remember = true;
        } else {
            $remember = false;
        }

		if ($this->auth->attempt($request->only('email', 'password'), $remember))
		{
			return redirect('/');
		}

		return redirect('/auth/login')->withErrors([
			'email' => 'These credentials do not match our records.',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
