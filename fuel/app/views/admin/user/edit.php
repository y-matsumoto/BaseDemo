<h2>Editing User</h2>
<br>

<?php echo render('admin/user/_form'); ?>
<p>
	<?php echo Html::anchor('admin/user/view/'.$user->id, 'View'); ?> |
	<?php echo Html::anchor('admin/user', 'Back'); ?></p>
