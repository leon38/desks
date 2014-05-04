<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="header">
	<div class="container">
		<div class="row">	
			<div id="logo">

			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'menu' ) ); ?>
			<div id="profile">
				<ul>
					<li><a data-toggle="modal" href="#modal-account">Your Account</a></li>
				</ul>
			</div>
			<div id="features"></div>
			<div class="clearfix"></div>
		</div>
	</div>
</header>
<div class="modal fade" id="modal-account">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="" role="form" class="form-horizontal" onsubmit="userRegistration(); return false;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Registration</h4>
				</div>
				<div class="modal-body">
						<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label">Firstname:</label>
							<div class="col-sm-6">
								<input type="text" id="firstname" name="firstname" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Lastname:</label>
							<div class="col-sm-6">
								<input type="text" id="lastname" name="lastname" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">E-mail:</label>
							<div class="col-sm-6">
								<input type="email" id="email" name="email" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="pass" class="col-sm-2 control-label">Password:</label>
							<div class="col-sm-6">
								<input type="password" id="pass" name="pass" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Confirm:</label>
							<div class="col-sm-6">
								<input type="password" id="confirm" name="confirm" class="form-control">
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->