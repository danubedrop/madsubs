<?php
	/**
		* The Header for our theme.
		*
		* Displays all of the <head> section and everything up till <div id="main">
		*
		* @package Expound
	*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        
        <?php wp_head(); ?>
        
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
	</head>
	
	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<?php do_action( 'expound_header_before' ); ?>
			<header id="masthead" class="site-header" role="banner">
				<div id="header-madsubs" style="position: relative; top: 0px; left: 0px; width: 1020px; height: 154px;">
					<div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1020px; height: 154px; overflow: hidden;">
						<?php
							$headers_array = array(
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_01.jpg" /></div>',
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_02.jpg" /></div>',
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_03.jpg" /></div>',
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_04.jpg" /></div>',
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_05.jpg" /></div>',
							'<div><img u="image" src="http://img.madsubs.org/static/headers/header_06.jpg" /></div>'
							);
							shuffle($headers_array);
							foreach($headers_array as $header){
								echo $header;
							}
						?>
					</div>
				</div>
				
				<nav id="site-navigation" class="navigation-main" role="navigation">
					<h1 class="menu-toggle"><?php _e( 'Menu', 'expound' ); ?></h1>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'expound' ); ?></a>
					
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 3 ) ); ?>
				<?php wp_nav_menu( array(
				'theme_location' => 'social',
				'depth' => 1,
				'container_id' => 'expound-social',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'fallback_cb' => '',
				) ); ?>
				<?php do_action( 'expound_navigation_after' ); ?>
				<div id="sb-search" class="sb-search">
				<form>
				<input class="sb-search-input" placeholder="Buscar..." type="search" value="" name="s" id="search">
				<input class="sb-search-submit" type="submit" value="">
				<span class="sb-icon-search"></span>
				</form>
				</div>
				</nav><!-- #site-navigation -->
				</header><!-- #masthead -->
				<?php do_action( 'expound_header_after' ); ?>
				
				<div id="main" class="site-main">
								