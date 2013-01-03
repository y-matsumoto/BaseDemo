<?php
class Controller_User_Index extends Controller_User {
	
	public function action_index()
	{
		$this->template->title = 'UserIndex';
		$this->template->content = View::forge('user/index');
	}
	
}