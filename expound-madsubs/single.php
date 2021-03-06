<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Expound
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<?php get_template_part( 'related-content' ); ?>

			<?php expound_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>
			<?php
				if(function_exists('like_counter_c')) { like_counter_c('text for like'); }
			?>
			<?php
				if(function_exists('dislike_counter_c')) { dislike_counter_c('text for dislike'); }
			?>
		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>