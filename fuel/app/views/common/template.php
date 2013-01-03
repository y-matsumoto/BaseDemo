<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<?php echo Asset::css('bootstrap.css'); ?>
<?php echo Asset::css('common.css'); ?>
<style>
body {
	margin: 50px;
}
</style>
<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js'
	)); ?>
<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<?php if (Auth::member(1)): ?>
			<div class="navbar-inner-user">
			<?php endif; ?>
			<?php if (Auth::member(100)): ?>
			<div class="navbar-inner-admin">
			<?php endif; ?>
				<div class="container">
				
					<a href="#" class="brand">BaseDemo</a>
					<ul class="nav">
						<?php if (Auth::member(1)): ?>
						<?php foreach (glob(APPPATH.'classes/controller/user/*.php') as $controller): ?>
	
						<?php
						$section_segment = basename($controller, '.php');
						$section_segment_disp = (strcmp($section_segment,'index')) ? $section_segment :'home';
						$section_title = Inflector::humanize($section_segment_disp);
						?>
	
						<li
							class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
							<?php echo Html::anchor('user/'.$section_segment, $section_title) ?>
						</li>
						<?php endforeach; ?>
						<?php endif; ?>
						
						<?php if (Auth::member(100)): ?>
						<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>
	
						<?php
						$section_segment = basename($controller, '.php');
						$section_segment_disp = (strcmp($section_segment,'index')) ? $section_segment :'home';
						$section_title = Inflector::humanize($section_segment_disp);
						?>
	
						<li
							class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
							<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
						</li>
						<?php endforeach; ?>
						<?php endif; ?>
					</ul>
	
					<ul class="nav pull-right">
	
						<li class="dropdown"><a data-toggle="dropdown"
							class="dropdown-toggle" href="#"><?php echo $current_user->username ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li><?php echo Html::anchor('sign/logout', 'Logout') ?></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="span12">
				<hr>
				<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
				<?php endif; ?>
				<?php if (Session::get_flash('info')): ?>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">×</button>
					<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('info')); ?>
					</p>
				</div>
				<?php endif; ?>
				<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">×</button>
					<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
				<?php endif; ?>
			</div>
			<div class="span12">
				<?php echo $content; ?>
			</div>
		</div>
		<hr />
		<footer>
			<p class="pull-right">BaseDemo Sample Application desu</p>
			<p>
				Powered by Fuelphp<br> <small>Version: 1.0 </small>
			</p>
		</footer>
	</div>
</body>
</html>
