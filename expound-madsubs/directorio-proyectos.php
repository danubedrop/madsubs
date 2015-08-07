<?php
/*
Template Name: Directorio de Todos los Proyectos
*/

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/directory.css" />
<div id="primary" class="content-area" style="width: 1020px;">
		<div id="content" class="site-content" role="main">
            <div id="directory">
                <div id="content">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php
                    $categories = array('blu-ray', 'hdtv', 'peliculas-ovas');
                    $output = array('', '', '');
                    for ($i = 0; $i <= 2; $i++) {
                        $args = array(
                            'post_type' => 'proyectos',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'tipos',
                                    'field' => 'slug',
                                    'terms' => $categories[$i]
                                )
                            )
                        );

                        $query = new WP_Query($args);
                        if ( $query -> have_posts() ) {
                            $output[$i] .= '<ul class="grid cs-style-3">';
                            $current_letter = '';
                            while ( $query -> have_posts() ) {
                                $query -> the_post();
                                $imagen_proyecto = types_render_field( 'imagen-proyecto', array( 'output'=>'raw' ) );
                                $image_array = @getimagesize($imagen_proyecto);
                                if ( $image_array[0] ) {
                                    $output[$i] .= '<li><figure><a href="'.get_the_permalink().'" target="_blank"><div style="background-image: url('.$imagen_proyecto.');"></div></a><figcaption><a href="'.get_the_permalink().'">'.get_the_title().'</a></figcaption></figure></li>';
                                }
                                else {
                                    $output[$i] .= '<li><figure><a href="'.get_the_permalink().'" target="_blank"><div></div></a><figcaption><a href="'.get_the_permalink().'">'.get_the_title().'</a></figcaption></figure></li>';
                                }
                            }
                            $output[$i] .= '</ul>';
                            wp_reset_query();
                        }
                    }
                    echo do_shortcode('[su_tabs vertical="yes"][su_tab title="Series | Blu-ray"]'.$output[0].'[/su_tab][su_tab title="Series | HDTV"]'.$output[1].'[/su_tab][su_tab title="Películas | OVAs"]'.$output[2].'[/su_tab][/su_tabs]');
                    ?>
                </div><!-- #content -->
            </div><!-- #directory -->

<?php get_footer(); ?>