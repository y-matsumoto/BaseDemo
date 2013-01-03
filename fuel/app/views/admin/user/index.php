<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Group</th>
			<th>Email</th>
			<th>Last login</th>
			<th>Auth type</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->username; ?></td>
			<td><?php echo Util_ViewUtil::group_to_disp_group($user->group); ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo Util_ViewUtil::timestamp_to_disp_datetime($user->last_login); ?></td>
			<td><?php echo Util_ViewUtil::auth_to_disp_auth($user->auth_type); ?></td>
			<td><?php echo Util_ViewUtil::dlt_flg_to_disp_dlt_flg($user->dlt_flg); ?></td>
			<td>
				<?php echo Html::anchor('admin/user/view/'.$user->id, 'View'); ?> |
				<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/user/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
