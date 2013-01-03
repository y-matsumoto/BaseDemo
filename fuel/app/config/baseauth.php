<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(
		'login_hash_salt' => 'ZegakljelktPm16AA$Y/dlgadkjjelijmaaZe',
		'groups' => array(
				1    => array('name' => 'Users', 'roles' => array('user')),
				100  => array('name' => 'Administrators', 'roles' => array('admin')),
		),
		'auth_type' => array(
				1   => array('type' => 'Basic'),
				2   => array('type' => 'Twitter'),
				3   => array('type' => 'Facebook'),
		),
);