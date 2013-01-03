<?php
class Util_ViewUtil
{
	/* Common View Display*/
	
	public static function timestamp_to_disp_datetime($timestamp = 0)
	{
		if(date(0) <> date($timestamp))
			return date("Y-m-d H:i:s",$timestamp);
		return '';
	}

	public static function get_groups_to_array()
	{
		Config::load('baseauth');
		$groups = Config::get('groups');
	
		$list = array();
		foreach($groups as $key => $val)
			$list += array($key => $val['name']);
	
		return $list;
	}
	
	/* Form */
	
	public static function form_auth_to_array()
	{
		Config::load('baseauth');
		$auth_type = Config::get('auth_type');

		$list = array();
		foreach($auth_type as $key => $val)
			 $list += array($key => $val['type']);
		
		return $list;
	}
	
	public static function form_groups_to_array()
	{
		Config::load('baseauth');
		$groups = Config::get('groups');
		
		$list = array();
		foreach($groups as $key => $val)
			$list += array($key => $val['name']);
		
		return $list;
	}
	
	
	/* View Display */
	
	public static function group_to_disp_group($group = 1)
	{
		Config::load('baseauth');
		$groups = Config::get('groups');
		return $groups[$group]['name'];
	}
	
	public static function auth_to_disp_auth($auth_type = 1)
	{
		Config::load('baseauth');
		$groups = Config::get('auth_type');
		return $groups[$auth_type]['type'];
	}
	
	public static function dlt_flg_to_disp_dlt_flg($dlt_flg = false)
	{
		return !$dlt_flg ? 'valid' : 'invalid';
	}
}