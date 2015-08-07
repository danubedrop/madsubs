<?php
/**
 * The Template for displaying all projects.
 *
 * @package Expound
 */

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/proyectos.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/descargas.css" />

	<div id="primary" class="content-area" style="width: 1020px;">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post() ; ?>
			
			<div class="proyecto">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="imagen_proyecto">
					<?php
						$imagen_proyecto = types_render_field( 'imagen-proyecto', array( 'output'=>'raw' ) );
						echo '<img src="'.$imagen_proyecto.'" width="400">';
					?>
				</div>
				<div class="info_proyecto">
					<section class="info_proyecto_tabs">
						<input id="info_proyecto_tab-1" type="radio" name="radio-info" class="info_proyecto_tab-selector-1" checked="checked" ></input>
						<label for="info_proyecto_tab-1" class="info_proyecto_tab-label-1">Ficha Técnica</label>
						
						<input id="info_proyecto_tab-2" type="radio" name="radio-info" class="info_proyecto_tab-selector-2" ></input>
						<label for="info_proyecto_tab-2" class="info_proyecto_tab-label-2">Sinopsis</label>
						
						<input id="info_proyecto_tab-3" type="radio" name="radio-info" class="info_proyecto_tab-selector-3" ></input>
						<label for="info_proyecto_tab-3" class="info_proyecto_tab-label-3">Capturas</label>
						
						<div class="clear-shadow"></div>
						
						<div class="info_proyecto_content">
							<div class="info_proyecto_content-1">
								<?php
									$estado = types_render_field( 'estado', array() );
									$progreso = types_render_field( 'progreso', array() );
									$fuente = types_render_field( 'fuente', array() );
									$codec_video = types_render_field( 'codec-video', array() );
									$codec_audio = types_render_field( 'codec-audio', array() );
									$resolucion = types_render_field( 'resolucion', array() );
									$contenedor = types_render_field( 'contenedor', array() );
									$bitrate_video = types_render_field( 'bitrate-video', array() );
									$bitrate_audio = types_render_field( 'bitrate-audio', array() );
									$idioma_audio = types_render_field( 'idioma-audio', array() );
									$idioma_subtitulos = types_render_field( 'idioma-subtitulos', array() );
									$scans = types_render_field( 'scans', array() );
									$contrasena = types_render_field( 'contrasena', array() );
									
									echo '<p><b>Estado:</b> '.$estado.'</p>';
									echo '<p><b>Progreso:</b> '.$progreso.'</p>';
									echo '<br>';
									echo '<p><b>Fuente:</b> '.$fuente.'</p>';
									echo '<br>';
									echo '<p><b>Códec Video:</b> '.$codec_video.'</p>';
									echo '<p><b>Códec Audio:</b> '.$codec_audio.'</p>';
									echo '<br>';
									echo '<p><b>Resolución:</b> '.$resolucion.'</p>';
									echo '<br>';
									echo '<p><b>Contenedor:</b> '.$contenedor.'</p>';
									echo '<p><b>Bitrate Video:</b> '.$bitrate_video.'</p>';
									echo '<p><b>Bitrate Audio:</b> '.$bitrate_audio.'</p>';
									echo '<br>';
									echo '<p><b>Idioma Audio:</b> '.$idioma_audio.'</p>';
									echo '<p><b>Idioma Subtítulos:</b> '.$idioma_subtitulos.'</p>';
									echo '<br>';
									if ($scans != '') {
										echo '<p><b>Scans:</b> '.$scans.'</p>';
										echo '<br>';
									}
									if ($contrasena != '') {
										echo '<p><b>Contraseña:</b> '.$contrasena.'</p>';
									}
								?>
							</div>
							<div class="info_proyecto_content-2">
								<?php
									$sinopsis = types_render_field( 'sinopsis', array() );
									echo '<p>'.$sinopsis.'</p>';
								?>
							</div>
							<div class="info_proyecto_content-3">
								<?php
									$capturas = types_render_field( 'capturas', array() );
									echo $capturas;
								?>
							</div>
						</div>
					</section>
				</div>
				<a class="descargas-button" id="trigger-descargas-proyecto" type="button">Descargas</a>
			</div>
			<div class="descargas descargas-simplegenie">
				<div class="descargas-div">
					<button type="button" class="descargas-close">Cerrar</button>
					<div class="descargas-proyecto">
						<?php
							$descargas_xml = types_render_field ( 'descargas', array( 'output' => 'raw' ) );
							$descargas = simplexml_load_string($descargas_xml);
							// Creación de los botones para los episodios
							foreach ($descargas->episodio as $episodio) {
								$episodio_num = $episodio['value'];
								$char_replace = array (".", " ");
								$episodio_num_ = str_replace ($char_replace, "-", $episodio_num);
								echo '<a class="episodio-button md-trigger" data-modal="modal-'.$episodio_num_.'">Episodio '.$episodio_num.'</a>';
							}
						?>
					</div>
				</div>
			</div>
			<?php
				$descargas_xml = types_render_field ( 'descargas', array( 'output' => 'raw' ) );
				$descargas = simplexml_load_string($descargas_xml);
				//var_dump($descargas_xml);
				//Creación de las ventanas modales para cada episodio
				foreach ($descargas->episodio as $episodio) {
					$episodio_num = (string) $episodio['value'];
					$char_replace = array (".", " ");
					$episodio_num_ = str_replace ($char_replace, "-", $episodio_num);
					echo '<div class="md-modal md-effect-1" id="modal-'.$episodio_num_.'">';
					echo '<div class="md-content">';
					echo '<h3>Episodio '.$episodio_num.'</h3>';
					echo '<div class="versiones">';
					foreach ($episodio->version as $version) {
						$version_value = (string) $version['value'];
						echo '<p>Versión '.$version_value.'</p>';
						foreach ($version->parte as $parte) {
							$parte_value = (string) $parte['value'];
							//echo '<li>Parte '.$parte_value.'</li>';
							echo '<p>';
							foreach ($parte->servidor as $servidor) {
								$servidor_value = (string) $servidor['value'];
								$enlace_value = (string) $servidor->enlace;
								echo '<a href="'.$enlace_value.'" target="_blank">'.$servidor_value.'</a>';
								//echo '<a href="'.$enlace_value.'" target="_blank"><img alt src="http://www.madsubs.org/static/buttons/button_dl_'.$servidor_value.'.png" height="40" width="140"></a>';
							}
							echo '</p>';
						}
						echo PHP_EOL;
					}
					echo '</div>';
					echo '<button type="button" class="md-close"></button>';
					echo '</div>';
					echo '</div>';
				}
			?>
			<div class="md-overlay"></div>
		<?php endwhile; // end of the loop. ?>
        
        <center><a id="linksPopup" onclick="createPopup();" style="cursor: pointer;">Enlaces en Texto</a></center>
        
        <script>
            function createPopup() {
                var popup = window.open("", "Popup", "scrollbars = 1, width = 450, height = 550");
                popup.document.write('<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/popup.css" />');
                popup.document.write('<title>Enlaces | <?php echo get_the_title(); ?> | Madness Subs</title>');
                <?php
                    $descargas_xml = types_render_field ( 'descargas', array( 'output' => 'raw' ) );
                    $descargas = simplexml_load_string($descargas_xml);
                    $clipboard = "";
                    $popup_html = "";
                    //Creación de las string de las URL
                    foreach ($descargas->episodio as $episodio) {
                        $episodio_num = (string) $episodio['value'];
                        //echo 'popup.document.write("<h1>Episodio ' .$episodio_num. '</h1>");';
                        $popup_html .= '<h1>Episodio ' .$episodio_num. '</h1>';
                        echo PHP_EOL;
                        foreach ($episodio->version as $version) {
                            $version_value = (string) $version['value'];
                            //echo 'popup.document.write("<h2>Versión ' .$version_value. '</h2>");';
                            $popup_html .= '<h2>Versión ' .$version_value. '</h2>';
                            foreach ($version->parte as $parte) {
                                $parte_value = (string) $parte['value'];
                                //echo 'popup.document.write("<h3>Parte ' .$parte_value. '</h3>");';
                                $popup_html .= '<h3>Parte ' .$parte_value. '</h3>';
                                foreach ($parte->servidor as $servidor) {
                                    $servidor_value = (string) $servidor['value'];
                                    $enlace_value = (string) $servidor->enlace;
                                    //echo 'popup.document.write("<p> ' .$enlace_value. '</p>");';
                                    $clipboard .= '<p> ' .$enlace_value. '</p>';
                                    $popup_html .= '<p> ' .$enlace_value. '</p>';
                                }
                            }
                        }
                    }
                    echo 'popup.document.write("' .$popup_html. '");';
                ?>;
                popup.document.close();
            }
        </script>
        
		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>