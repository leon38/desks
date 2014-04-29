<?php
/*
* Template name: Form new account
*
* @Author: leon38
* @Date:   2014-04-26 09:03:18
* @Last Modified by:   leon38
* @Last Modified time: 2014-04-26 19:00:38
*/

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	/*if ( twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}*/
?>

<div id="primary" class="content-area">
	<div id="content" class="site-content container" role="main">
		<div class="col-6">
			<form action="" method="post">
				<h2>Sign up</h2>
				<ul>
					<li><label for="name">Name</label><input type="text" id="name" name="name"></li>
					<li><label for="email">E-mail</label><input type="email" id="email" name="email"></li>
					<li><label for="password">Password</label><input type="password" name="password" id="password"></li>
					<li><label for="confirm">Password again</label><input type="password" id="confirm" name="confirm"></li>
					<li><input type="submit" value="Sign up"></li>
				</ul>
			</form>
		</div>
	</div>
</div>