<?php
	
	function enqueue_child_theme_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
		wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
	}
	
	add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

    function wpc_remove_autop_for_posttype( $content ) {
        'proyectos' === get_post_type() && remove_filter( 'the_content', 'wpautop' );
        return $content;
    }
    
    add_filter( 'the_content', 'wpc_remove_autop_for_posttype', 0 );

    /* Filter Tiny MCE Default Settings */
    add_filter( 'tiny_mce_before_init', 'my_switch_tinymce_p_br' );
    
    /**
     * Switch Default Behaviour in TinyMCE to use "<br>"
     * On Enter instead of "<p>"
     * 
     * @link https://shellcreeper.com/?p=1041
     * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
     * @link http://www.tinymce.com/wiki.php/Configuration:forced_root_block
     */
    function my_switch_tinymce_p_br( $settings ) {
        $settings['forced_root_block'] = false;
        return $settings;
    }
    
    /* wp_head Clean Script */
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    /* End of wp_head Clean Script */
    
    /* Global Asynchronous Load function for Javascript using the #asyncload tag */
    function add_async_forscript($url)
    {
        if (strpos($url, '#asyncload')===false)
            return $url;
        else if (is_admin())
            return str_replace('#asyncload', '', $url);
        else
            return str_replace('#asyncload', '', $url)."' async='async"; 
    }
    
    add_filter('clean_url', 'add_async_forscript', 11, 1);
    /* End of Global Asynchonous Load function for Javascript using the #asyncload tag */
    
    /* JQuery Render Blocking Workaround */
    function jquery_render_block()   
    {  
        if (!is_admin())   
        {
            wp_enqueue_script('jquery','/wp-includes/js/jquery/jquery.js','','',true); 
        }  
    }  
    add_action('init', 'jquery_render_block'); 
    
?>