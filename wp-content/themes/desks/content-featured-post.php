<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mask">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<?php
			// Output the featured image.
			if ( has_post_thumbnail() ) :
				if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
					the_post_thumbnail();
				} else {
					the_post_thumbnail( 'twentyfourteen-full-width' );
				}
			endif;
		?>
		</a>
		<div class="bg">
			<div class="title-subtitle container">
				<div class="title pull-left">
					<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
					<p><?php echo get_field('subtitle', get_the_ID()); ?></p>
				</div>
				<div class="desc pull-right">
					<h3>Included Products</h3>
					<div class="clearfix"></div>
					<?php the_content(); ?>
				</div>
				<div class="clearfix"></div>
				<div class="infos">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
					<span class="author"><?php the_author(); ?></span>
					<span class="metas">
						<?php echo get_post_meta(get_the_ID(), 'views', true).' views, '; ?>
						<?php echo count(get_comments(array('post_id' => get_the_ID(), 'status' => 'approve'))).' comments, '; ?>
						<?php echo get_post_meta(get_the_ID(), 'likes', true).' likes'; ?>
					</span>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>


	</header><!-- .entry-header -->
</article><!-- #post-## -->
