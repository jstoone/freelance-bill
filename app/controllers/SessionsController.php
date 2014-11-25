<?php

use JakobSteinn\Sessions\LoginCommand;
use JakobSteinn\Sessions\LoginForm;
use JakobSteinn\Sessions\LoginSanitizer;

class SessionsController extends \BaseController {

	/**
	 * @var LoginForm
	 */
	private $loginForm;

	public function __construct(LoginForm $loginForm)
	{
		$this->beforeFilter('guest');
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the form for logging in.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Create a new session for user
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->loginForm->validate(Input::all());

		$loginSuccess = $this->execute(LoginCommand::class, null, [
			LoginSanitizer::class
		]);

		if( ! $loginSuccess)
		{
			Flash::warning('Invalid credentials');
			return Redirect::back()->withInput();
		}

		Flash::success('Weeee!');
		return Redirect::route('sessions.create');
	}

	/**
	 * Log user out
	 * DELETE /sessions/{id}
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
	}

}
