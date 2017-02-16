<?php
/**
 * Template Name: Personal Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_promo_text = get_post_meta(get_the_ID(), 'page_promo_text',true);
		$page_bg_img = get_post_meta(get_the_ID(), 'parallax_bg',true);
		$page_bg_color = get_post_meta(get_the_ID(), 'page_bgcolor',true);
	?>
		
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="intro full-height">

			<div class="container-fluid">
				<div class="row">
						<article class="text-center col-md-6 fullheight" style="background: <?php echo esc_attr($page_bg_color);?>">
							<div class="valign">
								<div class="crest personal-page">
									<h1 class="font2 black"><?php echo get_the_title();?></h1>
									<h3 class="font3 silver"><?php echo $page_promo_text;?></h3>
								</div>
								<div class="clear"></div>
								<div>
									<?php
										the_content();
									?>
								</div>
							</div>
						</article>
						<article class="covered-bg text-center col-md-6 fullheight" style="background: url(<?php echo esc_url($page_bg_img);?>) center center no-repeat;">
						</article>
				</div>
			</div>
		</section>
	<?php
	endwhile;
	

endif;


get_footer();

?>