<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int', 'default' => '1'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'last_login' => array('constraint' => 11, 'type' => 'int'),
			'auth_type' => array('constraint' => 11, 'type' => 'int', 'default' => '1'),
			'salt' => array('constraint' => 255, 'type' => 'varchar'),
			'dlt_flg' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
		\DBUtil::create_index('users', array('username', 'email'), '', 'UNIQUE');
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}