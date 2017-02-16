<?php
/**
 * Template Name: Promo Style Showcase Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');

if ( isset($_GET['debug']) ) var_dump('promo-showcase');
if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_bg_img = get_post_meta(get_the_ID(), 'parallax_bg',true);
		$page_bg_color = get_post_meta(get_the_ID(), 'page_bgcolor',true);
	?>
		
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="promo-showcase-page full-height">

			<div class="fullscreen-carousel owl-carousel owl-nav-sticky-wide full-height">
				<?php
				$loop = new WP_Query( array( 'post_type' => 'elegance_showcase', 'orderby' => 'date', 'order' => 'DESC', 'paged'=> false, 'posts_per_page' => '-1' ) );

		        
				$total_showcase_items = 0;
				$current_item_no = 0;
		        while ( $loop->have_posts() ) : $loop->the_post();
		        	
		        	$total_showcase_items++;
		        	
		        endwhile;

		        while ( $loop->have_posts() ) : $loop->the_post();
		        	$showcase_bg_image          = get_post_meta( $post->ID,'elegance_showcase_bg_image',true);
				  	$showcase_caption           = get_post_meta( $post->ID,'elegance_showcase_caption',true);
				  	$showcase_external_url      = get_post_meta( $post->ID,'elegance_showcase_link',true);
				  	$showcase_link_txt          = get_post_meta( $post->ID,'elegance_showcase_link_txt',true);
				  	$current_item_no = $current_item_no + 1;
				?>
					<div class="item promo-showcase-carousel-item intro-09-carousel-item text-left fullheight std-showcase-item-0<?php echo esc_attr($current_item_no);?>">
						<div class="inner-overlay pad-inner fullheight">
							<div class="valign">
								<h5 class="font2"><span class="color-bg white font3"><?php echo $showcase_caption;?></span></h5>
								<h1 class="font2 white"><?php echo get_the_title(); ?></h1>
								<div class="caps-link"><span><a href="<?php echo esc_url($showcase_external_url);?>" class="explore font4 color ease"><?php echo $showcase_link_txt;?></a></span></div>
							</div>
							<div class="caps-count">
								<p class="font3 white">
									<span class="font3 color"><?php echo $current_item_no;?></span>/<span class="font3 color"><?php echo $total_showcase_items;?></span>
								</p>
							</div>
						</div>
					</div>
					<!-- item:ends -->
				<?php
				endwhile;
				?>
			</div>
			<!-- carousel:ends -->

		</section>
	<?php
	endwhile;
	

endif;


get_footer();

?>