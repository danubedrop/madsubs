<?php
	/**
		* The template for displaying the footer.
		*
		* Contains the closing of the id=main div and all content after
		*
		* @package Expound
	*/
?>

</div><!-- #main -->

<!--Follow Sidebar-->
<div class="follow-sidebar">
    <a class="follow-rss" href="http://feeds.feedburner.com/madsubs/OvqN" target="_blank">
        <img class="alignnone" src="<?php echo get_stylesheet_directory_uri(); ?>/img/rss.png" alt="RSS" title="RSS" width="32" height="32" />
    </a>
    <a class="follow-facebook" href="http://www.facebook.com/madsubs" target="_blank">
        <img class="alignnone" src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.png" alt="Facebook" title="Facebook" width="32" height="32" />
    </a>
    <a class="follow-twitter" href="https://twitter.com/madsubs" target="_blank">
        <img class="alignnone" src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" alt="" title="Twitter" width="32" height="32" />
    </a>
    <a class="follow-gplus" href="https://plus.google.com/u/0/113538221655547359533/posts" target="_blank">
        <img class="alignnone" src="<?php echo get_stylesheet_directory_uri(); ?>/img/gplus.png" alt="" title="Google+" width="32" height="32" />
    </a>
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">
		<p id="footer_text">Madness Subtitles Inc. 2015</p>
		<div id="avgthreatlabs_safetybadge_small">
			<noscript>
				<a href="http://www.avgthreatlabs.com?utm_source=Safety_Widget&utm_medium=NA&utm_campaign=SSBW" target="_blank">AVG Threatlabs</a>
			</noscript>
		</div>
		<script content-type="application/javascript" src="https://api.avgthreatlabs.com/static/js/security_s.js"></script>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
	
	<script content-type="application/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
	<script content-type="application/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jssor.slider.min.js"></script>
	<script content-type="application/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js"></script>
	<script content-type="application/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/uisearch.js"></script>
	<?php
		/* Javascript Dependencies for Proyectos*/
		if ( is_singular( 'proyectos' ) ) {
			echo '<script content-type="application/javascript" src="'. get_stylesheet_directory_uri() .'/js/modalEffects.js"></script>';
			echo '<script content-type="application/javascript" src="'. get_stylesheet_directory_uri() .'/js/overlay.js"></script>';
		}
	?>
	<script>
		( function ( $ ) {
			"use strict";
			$ ( function () {
				var _SlideshowTransitions = [
				//Fade
				{ $Duration: 2500, $Opacity: 2 }
				];
				
				var options = {
					$AutoPlay: true,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
					$AutoPlayInterval: 60000,                          //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
					$PauseOnHover: 0,                                  //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
					$DragOrientation: 0,                               //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
					$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
						$Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
						$Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
						$TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
						$ShowLink: true                                 //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
					}
				};
				
				var jssor_slider1 = new $JssorSlider$('header-madsubs', options);
				
				function ScaleSlider() {
					var parentWidth = $('#header-madsubs').parent().width();
					if (parentWidth) {
						jssor_slider1.$ScaleWidth(parentWidth);
					}
					else
					window.setTimeout(ScaleSlider, 30);
				}
				
				ScaleSlider();
				
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
			});
		}(jQuery));
	</script>
	<script>
		jQuery(document).ready(function ($) {
			var _SlideshowTransitions = [
			//Fly Twins
			//{$Duration:1500,x:0.3,$During:{$Left:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Brother:{$Duration:1000,x:-0.3,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}}
			{$Duration:600,x:-1,$Delay:50,$Cols:15,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}
			];
			
			var _CaptionTransitions = [
			{$Duration:900,y:-0.6,$Easing:{$Bottom:$JssorEasing$.$EaseInOutSine},$Opacity:2}
			];
			
			var options = {
				$AutoPlay: true,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
				$AutoPlayInterval: 5000,                           //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
				$PauseOnHover: 1,                                  //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
				$DragOrientation: 0,                               //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
				$SlideshowOptions: {                               //[Optional] Options to specify and enable slideshow or not
					$Class: $JssorSlideshowRunner$,                //[Required] Class to create instance of slideshow
					$Transitions: _SlideshowTransitions,           //[Required] An array of slideshow transitions to play slideshow
					$TransitionsOrder: 1,                          //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
					$ShowLink: true                                //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
				},
				$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
					$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
					$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
				},
				$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
					$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
					$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
					$PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
					$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
				}
			};
			
			var jssor_slider1 = new $JssorSlider$('active-projects', options);
			
			function ScaleSlider() {
				var parentWidth = $('#active-projects').parent().width();
				if (parentWidth) {
					jssor_slider1.$ScaleWidth(parentWidth);
				}
				else
				window.setTimeout(ScaleSlider, 30);
			}
			
			ScaleSlider();
			
			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
		});
	</script>
    <script>
        new UISearch( document.getElementById( 'sb-search' ) );
	</script>
	
    <script id="sid0020000077528852780">(function() {function async_load(){s.id="cid0020000077528852780";s.src=(window.location.href.indexOf('file:///') > -1 ? 'http:' : '') + '//st.chatango.com/js/gz/emb.js';s.style.cssText="width:400px;height:500px;";s.async=true;s.text='{"handle":"madsubs-chat2","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","q":"000000","r":100,"pos":"br","cv":1,"cvbg":"000000","cvw":150,"cvh":35}}';var ss = document.getElementsByTagName('script');for (var i=0, l=ss.length; i < l; i++){if (ss[i].id=='sid0020000077528852780'){ss[i].id +='_';ss[i].parentNode.insertBefore(s, ss[i]);break;}}}var s=document.createElement('script');if (s.async==undefined){if (window.addEventListener) {addEventListener('load',async_load,false);}else if (window.attachEvent) {attachEvent('onload',async_load);}}else {async_load();}})();</script>
	
</body>
</html>