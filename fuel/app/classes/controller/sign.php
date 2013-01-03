<?php
class Controller_Sign extends Controller_Base {

	public function before()
	{
		parent::before();
	}

	public function action_login()
	{
		if(Auth::check()) Response::redirect($this->get_groups_redirect_path());

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			->add_rule('required');
			$val->add('password', 'Password')
			->add_rule('required');

			if ($val->run())
			{
				if (Auth::instance()->login(Input::post('email'), Input::post('password')))
				{
					$current_user = Model_User::find_by_username(Auth::get_screen_name());
					Session::set_flash('success', e('Welcome, '.$current_user->username));

					Response::redirect($this->get_groups_redirect_path());
				}

				// login failure
				Session::set_flash('error', e('login error. please try agein'));
					
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('admin/login')->set('val', $val, false); // [sign]folder movement failure ><
	}

	public function action_signup()
	{
		if(Auth::check()) Response::redirect($this->get_groups_redirect_path());

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('username', 'Username')
			->add_rule('required')
			->add_rule('min_length', 3)
			->add_rule('max_length', 50);

			$val->add('password', 'Password')
			->add_rule('required')
			->add_rule('min_length', 5)
			->add_rule('max_length', 50);

			$val->add('email', 'Email Address')
			->add_rule('required')
			->add_rule('valid_email');

			if ($val->run())
			{
				try{

					if (Auth::instance()->create_user($val->validated('username'),
							$val->validated('password'), $val->validated('email'), 1))
					{
						Session::set_flash('success', e('Thanks for registering'));
						Response::redirect('sign/login');
					}

					// account register failure
					Session::set_flash('error', e('An unexpected error occurred. please try agein'));

				}catch(Exception $e){
					Session::set_flash('error',  $e->getMessage());
				}
			}
		}
		$this->template->title = 'SignUp';
		$this->template->content = View::forge('sign/signup')->set('val', $val, false); 
	}

	public function action_logout()
	{
		if(!Auth::logout())
		{
			Session::set_flash('info', e('logout success'));
			Response::redirect('sign/login');
		}	
	}

	public function get_groups_redirect_path()
	{
		$groups = Auth::instance()->get_groups();
		$group = $groups[0][1];

		$group == Util_Const::GROUP_ADMINISTRATOR_KEY and $redirect_path = 'admin/index';
		$group == Util_Const::GROUP_USER_KEY and $redirect_path = 'user/index';
		return empty($redirect_path) ? '':$redirect_path;
	}
}