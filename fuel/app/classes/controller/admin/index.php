<?php
class Controller_Admin_Index extends Controller_Admin {

	public function action_index()
	{
		$this->template->title = 'AdminIndex';
		$this->template->content = View::forge('admin/index');
	}
}