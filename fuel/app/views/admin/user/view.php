<h2>
	Viewing #
	<?php echo $user->id; ?>
</h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?>
</p>
<p>
	<strong>Group:</strong>
	<?php echo Util_ViewUtil::group_to_disp_group($user->group); ?>
</p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?>
</p>
<p>
	<strong>Last login:</strong>
	<?php echo Util_ViewUtil::timestamp_to_disp_datetime($user->last_login); ?>
</p>
<p>
	<strong>Auth type:</strong>
	<?php echo Util_ViewUtil::auth_to_disp_auth($user->auth_type); ?>
</p>
<p>
	<strong>Status:</strong>
	<?php echo Util_ViewUtil::dlt_flg_to_disp_dlt_flg($user->dlt_flg); ?>
</p>

<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?>
|
<?php echo Html::anchor('admin/user', 'Back'); ?>