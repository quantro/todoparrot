<?php namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticator;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use App\User;

class AuthController extends Controller {

	/**
	 * The authenticator implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Authenticator  $auth
	 * @return void
	 */
	public function __construct(Authenticator $auth)
	{
		$this->auth = $auth;

		$this->beforeFilter('csrf', ['on' => ['post']]);
		$this->beforeFilter('guest', ['except' => ['getLogout']]);
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
			return redirect('/')->with('message', 'You have successfully signed in.');
		}

		return redirect('/login')->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?',
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

		return redirect('/')->with('message', 'You are now signed out.');
	}

}
