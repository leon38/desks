<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="filters">
							<label>Sort by: </label>
							<span>Popular</span>
							<span>Recent</span>
							<span>Most Liked</span>
							<span>Past Features</span>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
		<?php
			$i = 0;
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
				?>
				<?php echo ($i%3 == 0) ? '<div class="row">' : ''; ?>
					<div class="col-lg-4 col-md-4 post">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array('class' => 'img-responsive') ); ?>
							<div class="bg"></div>
						</a>
					</div>
					<?php echo (($i+1)%3 == 0 && $i > 0) ? '</div>' : ''; ?>
				<?php
				$i++;
				endwhile;
				?>
				</div>
				<?php
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		</div><!-- #content -->
		<div class="clearfix"></div>
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
	<div class="clearfix"></div>
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
