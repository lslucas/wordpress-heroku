<?php
/**
 * Template Name: Vimeo Background Video
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		
	?>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="vimeo-bgvideo-page">
			<section class="parallax-layer">
				<div class="container-fluid">
					<div class="row">
							<article class="text-center col-md-12 fullheight inner-overlay">
								<div class="valign">
									<?php
									the_content();
									?>
								</div>
							</article>
					</div>
				</div>
			</section>
		</section>
	<?php
	endwhile;
	

endif;

wp_enqueue_script( 'okvideo-lib' );
wp_enqueue_script( 'vimeo-fix' );
wp_enqueue_script( 'vimeo-video-init' );

$vimeo_bg_options = array( 'vdo_source' => $elegance_options['vimeo_vdo_src'], 'mute_status' => intval($elegance_options['vimeo_vdo_mute_status']), 'loop_status' => $elegance_options['vimeo_vdo_loop_status']);
wp_localize_script('vimeo-video-init', 'okplayer_obj', $vimeo_bg_options);

get_footer();

?>