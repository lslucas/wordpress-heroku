<?php
/**
 * Template Name: WooCommerce
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
get_header();



	?>
		<section id="shop-page" class="shop white-bg fullheightmin">
			<?php
				get_template_part('shop-header');
			?>
			<section class="container">
    
				<div class="row add-top-half add-bottom-half">
					<!-- shop-grid:starts -->
					<article class="col-md-12">
						<div class="row"><?php woocommerce_content(); ?></div>
					</article>
				</div>
			</section>
			<div class="offer-price-txt hidden-md hidden-lg hidden-sm hidden-xs"><?php _e('Offer Price', 'elegancelang'); ?></div>
			<div class="outofstock-txt hidden-md hidden-lg hidden-sm hidden-xs"><?php _e('No Stock', 'elegancelang'); ?></div>
			<div class="featured-item-txt hidden-md hidden-lg hidden-sm hidden-xs"><?php _e('Featured Item', 'elegancelang'); ?></div>
		</section>
	<?php
	
	
	


get_footer();
?>