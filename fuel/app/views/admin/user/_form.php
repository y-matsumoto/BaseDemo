<?php echo Form::open(); ?>

<fieldset>
	<div class="clearfix">
		<?php echo Form::label('Username', 'username'); ?>

		<div class="input">
			<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'span4')); ?>
		</div>
	</div>
	<div class="clearfix">
		<?php echo Form::label('Password', 'password'); ?>

		<div class="input">
			<?php echo Form::input('password', Input::post('password'), array('class' => 'span4')); ?>
		</div>
	</div>
	<div class="clearfix">
		<?php echo Form::label('Group', 'group'); ?>

		<div class="input">
			<?php foreach (Util_ViewUtil::form_groups_to_array() as $key => $val): ?>
			<?php echo Form::radio('group', $key, Input::post('group',isset($user) ? $user->group : '') == $key) ?>
			<?php echo $val ?>
			<?php endforeach ?>
		</div>
	</div>
	<div class="clearfix">
		<?php echo Form::label('Email', 'email'); ?>

		<div class="input">
			<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span4')); ?>
		</div>
	</div>
	<div class="clearfix">
		<?php echo Form::label('Auth type', 'auth_type'); ?>

		<div class="input">
			<?php foreach (Util_ViewUtil::form_auth_to_array() as $key => $val): ?>
			<?php echo Form::radio('auth_type', $key, Input::post('auth_type',isset($user) ? $user->auth_type : '') == $key) ?>
			<?php echo $val ?>
			<?php endforeach ?>
		</div>
	</div>
	<div class="clearfix">
		<?php echo Form::label('Status', 'status'); ?>
		<div class="input">
		<?php echo Form::checkbox('dlt_flg', Util_Const::DB_DLT_ON , (int)Input::post('dlt_flg',isset($user) ? (int)$user->dlt_flg : null) == Util_Const::DB_DLT_OFF ? null: true ); ?>
		</div>
	</div>
	<div class="actions">
		<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
	</div>
</fieldset>
<?php echo Form::close(); ?>