<?php
	/* Template Name: Staff */
	
add_filter( 'expound_force_full_width', '__return_true' );
get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/staff.css" />

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'content', 'page' ); ?>
		
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
			comments_template();
		?>
		
		<?php endwhile; // end of the loop. ?>
		
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>