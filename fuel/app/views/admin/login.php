<?php echo Form::open(array()); ?>

<?php if (isset($_GET['destination'])): ?>
<?php echo Form::hidden('destination',$_GET['destination']); ?>
<?php endif; ?>

<?php if (isset($login_error)): ?>
<div class="error">
	<?php echo $login_error; ?>
</div>
<?php endif; ?>
<div class="hero-unit">
	<div class="row-fluid">
		<div class="span8" style="border-right: 1px solid #ddd">
			<h2>Sample Application</h2>
			<h1>BaseDemo</h1>
			<p style="margin-top: 1em;">Please teach the problematical point</p>
			<p>
				<?php echo Html::anchor('sign/signup', 'New Account Register', array('class'=>'btn btn-primary btn-large')) ?>
			</p>
		</div>
		<div class="span4">
			<h4 style="line-height: 3em;">Login</h4>
			<div class="control-group">
				<div class="controls">
					<?php echo Form::input('email', Input::post('email'), array('placeholder' => 'Email or Username', 'size' => 50)); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<?php echo Form::input('password', Input::post('password'), array('type' => 'password', 'placeholder' => 'Password' ,'size' => 50))?>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class'=>'btn btn-success')); ?>
				</div>
			</div>

			<?php if ($val->error('email')): ?>
			<div class="error">
				<?php echo $val->error('email')->get_message('Email or Username cannot be blank'); ?>
			</div>
			<?php endif; ?>
			<?php if ($val->error('password')): ?>
			<div class="error">
				<?php echo $val->error('password')->get_message('Password cannot be blank'); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php echo Form::close(); ?>