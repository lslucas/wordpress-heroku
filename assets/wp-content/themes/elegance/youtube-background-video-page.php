<?php
/**
 * Template Name: Youtube Background Video
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
		<a href="#" id="bgndVideo" class="player" data-property="{videoURL:'http://www.youtube.com/watch?v=<?php echo esc_attr($elegance_options['youtube_vdo_src']);?>',containment:'body', mute: <?php echo esc_attr($elegance_options['youtube_vdo_mute_status']);?>, loop: <?php echo esc_attr($elegance_options['youtube_vdo_loop_status']);?>,autoPlay:true, startAt:0, opacity:1}">My video</a>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="youtube-bgvideo-page">
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

wp_enqueue_script( 'yt-player-lib' );
wp_enqueue_script( 'youtube-video-init' );



get_footer();

?>