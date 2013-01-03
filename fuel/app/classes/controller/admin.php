<?php
class Controller_Admin extends Controller_Base {

	public function before()
	{
		parent::before();

		if ( ! Auth::member(100) and Request::active()->action != 'login')
		{
			Response::redirect('sign/login');
		}
	}
}