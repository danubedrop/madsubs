<?php
	/**
		* Template Name: Inicio
		* 
		* The template for displaying all pages.
		*
		* This is the template that displays all pages by default.
		* Please note that this is the WordPress construct of pages
		* and that other 'pages' on your WordPress site will use a
		* different template.
		*
		* @package Expound
	*/
	
get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slideshows.css" />

<div id="active-projects">
	<div u="loading" style="position: absolute; top: 0px; left: 0px;">
		<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
		background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
		</div>
		<div style="position: absolute; display: block; background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/loading.gif) no-repeat center center;
		top: 0px; left: 0px;width: 100%;height:100%;">
		</div>
	</div>
	<div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1020px; height: 200px; overflow: hidden;">
                <div>
			<a u="image" href="http://www.madsubs.org/proyectos/blu-ray/date-a-live-ii-bd/"><img u="image" src="http://img.madsubs.org/uploads/2015/07/DALIIban.jpg" /></a>
			<div id="project-nombre" u=caption t="0" d=-200>
				Date a Live II
			</div>
			<div id="project-num" u=caption t="0" d=-200>
				02/10
			</div>
		</div>
		<div>
			<a u="image" href="http://www.madsubs.org/proyectos/blu-ray/nagi-no-asukara/"><img u="image" src="http://img.madsubs.org/static/active-projects/nagi-no-asukara.jpg" /></a>
			<div id="project-nombre" u=caption t="0" d=-200>
				Nagi no Asukara
			</div>
			<div id="project-num" u=caption t="0" d=-200>
				18/26
			</div>
		</div>
		<div>
			<a u="image" href="http://www.madsubs.org/proyectos/blu-ray/saki/"><img u="image" src="http://img.madsubs.org/static/active-projects/saki.jpg" /></a>
			<div id="project-nombre" u=caption t="0" d=-200>
				Saki
			</div>
			<div id="project-num" u=caption t="0" d=-200>
				16/26
			</div>
		</div>
		<div>
			<a u="image" href="http://www.madsubs.org/proyectos/blu-ray/shinmai-maou-no-testament-bd/"><img u="image" src="http://img.madsubs.org/static/active-projects/shinmai-maou-no-testament.jpg" /></a>
			<div id="project-nombre" u=caption t="0" d=-200>
				Shinmai Maou no Testament
			</div>
			<div id="project-num" u=caption t="0" d=-200>
				08/12
			</div>
		</div>
	</div>
	<span id="arrowleft" u="arrowleft" class="jssora09l">
	</span>
	<span id="arrowright" u="arrowright" class="jssora09r">
	</span>
	<div id="project-titulo">
		Proyectos Activos
	</div>
</div>

<?php if ( is_home() && ! is_paged() ) : ?>
<?php do_action( 'expound_home_title' ); ?>
<?php elseif ( is_archive() || is_search() ) : // home & not paged ?>
<header class="page-header">
<h1 class="page-title">
<?php
if ( is_category() ) {
printf( __( '%s', 'expound' ), '<span>' . single_cat_title( '', false ) . '</span>' );

} elseif ( is_tag() ) {
printf( __( 'Tag Archives: %s', 'expound' ), '<span>' . single_tag_title( '', false ) . '</span>' );

} elseif ( is_author() ) {
/* Queue the first post, that way we know
* what author we're dealing with (if that is the case).
*/
the_post();
printf( __( 'Author Archives: %s', 'expound' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
/* Since we called the_post() above, we need to
* rewind the loop back to the beginning that way
* we can run the loop properly, in full.
*/
rewind_posts();

} elseif ( is_day() ) {
printf( __( 'Daily Archives: %s', 'expound' ), '<span>' . get_the_date() . '</span>' );
} elseif ( is_month() ) {
printf( __( 'Monthly Archives: %s', 'expound' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
} elseif ( is_year() ) {
printf( __( 'Yearly Archives: %s', 'expound' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
} elseif ( is_search() ) {
printf( __( 'Search Results for: %s', 'expound' ), '<span>' . get_search_query() . '</span>' );
} else {
_e( 'Archives', 'expound' );
}
?>
</h1>
<?php
if ( is_category() ) {
// show an optional category description
$category_description = category_description();
if ( ! empty( $category_description ) )
echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

} elseif ( is_tag() ) {
// show an optional tag description
$tag_description = tag_description();
if ( ! empty( $tag_description ) )
echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
}
?>
</header><!-- .page-header -->
<?php endif; ?>

<?php
if ( is_home() && ! is_paged() ) // condition should be same as in pre_get_posts
get_template_part( 'featured-content' );
?>

<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">

<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
/* Include the Post-Format-specific template for the content.
* If you want to overload this in a child theme then include a file
* called content-___.php (where ___ is the Post Format name) and that will be used instead.
*/
get_template_part( 'content', get_post_format() );
?>

<?php endwhile; ?>

<?php expound_content_nav( 'nav-below' ); ?>

<?php elseif ( ! is_home() || is_paged() ) : ?>

<?php get_template_part( 'no-results', 'index' ); ?>

<?php else : ?>

<?php
$featured_posts = expound_get_featured_posts();
if ( ! $featured_posts->have_posts() )
get_template_part( 'no-results', 'index' );
?>

<?php endif; ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
