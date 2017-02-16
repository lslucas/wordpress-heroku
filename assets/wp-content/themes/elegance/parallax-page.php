<?php
/**
 * Template Name: Parallax Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_bg_img = get_post_meta(get_the_ID(), 'parallax_bg',true);
		$page_bg_color = get_post_meta(get_the_ID(), 'page_bgcolor',true);
	?>
		
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="eleg-parallax-page page-bg parallax-layer" style="background: url(<?php echo esc_url($page_bg_img);?>); background-color:<?php echo esc_attr($page_bg_color);?>;">

			<div class="eleg-parallax-page-overlay fullheight">
			  	<div class="valign">
				  	<div class="container-fluid">
					    <div class="row">
					        <?php
if ( isset($_GET['debug']) ) echo 'parallax-page';
								the_content();
							?>
					    </div>
				  	</div>  
				</div>
			</div>
		</section>
	<?php
	endwhile;
	

endif;


get_footer();

?>