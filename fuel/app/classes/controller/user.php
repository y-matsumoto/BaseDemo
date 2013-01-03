<?php
class Controller_User extends Controller_Base {

	public function before()
	{
		parent::before();

		if ( ! Auth::member(1) and Request::active()->action != 'login')
		{
			Response::redirect('sign/login');
		}
	}
}