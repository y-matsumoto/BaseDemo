<?php
class Auth_Group_BaseAuth extends Auth\Auth_Group_Driver {

	protected $config = array('drivers' => array('acl' => array('BaseAuth')));

	public function get_name($group = null) {
		// noop
	}

	public function member($group, $user = null) {
		$auth = empty($user) ? Auth::instance() : Auth::instance($user[0]);
		$groups = $auth->get_groups();
		return in_array(array($this->id, $group), $groups);
	}
}