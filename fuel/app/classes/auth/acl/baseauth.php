<?php
class Auth_Acl_BaseAuth extends Auth\Auth_Acl_Driver {
	public function has_access($condition, Array $entity) {
		if (count($entity) > 0) {
			$group = Auth::group($entity[0]);
			if (!is_null($group) || !empty($group)) return $group->member($condition);
		}
		return false;
	}
}