<?php
class Controller_Admin_User extends Controller_Admin
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all',array('order_by' => array('created_at' => 'desc')));
		$this->template->title = "Users View";
		$this->template->content = View::forge('admin/user/index', $data);
	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		$this->template->title = "User View";
		$this->template->content = View::forge('admin/user/view', $data);

	}

	public function action_create()
	{

		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{

				try
				{
					if (Auth::instance()->create_user($val->validated('username'),
							$val->validated('password'), $val->validated('email'), Input::post('group'),
							Input::post('auth_type'),Input::post('dlt_flg')))
					{
						Session::set_flash('success', e('success create user'));
						Response::redirect('admin/user');
					}

					Session::set_flash('error', e('Could not save user.'));

				}
				catch(Exception $e)
				{
					Session::set_flash('error',  $e->getMessage());
				}

			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users Create";
		$this->template->content = View::forge('admin/user/create');

	}

	public function action_edit($id = null)
	{
		
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');
		
		if ($val->run())
		{

			try
			{
				if (Auth::instance()->update_user($id ,$val->validated('username'),
						$val->validated('password'), $val->validated('email'), Input::post('group'),
						Input::post('auth_type'),Input::post('dlt_flg')))
				{
					Session::set_flash('success', e('success update user'));
					Response::redirect('admin/user');
				}

				Session::set_flash('error', e('Could not save user.'));

			}
			catch(Exception $e)
			{
				Session::set_flash('error',  $e->getMessage());
			}

		}
		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');
				//$user->last_login = $val->validated('last_login');
				$user->auth_type = $val->validated('auth_type');
				//$user->salt = $val->validated('salt');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users Edit";
		$this->template->content = View::forge('admin/user/edit');

	}

}