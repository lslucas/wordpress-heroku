<?php 


if ( $_REQUEST["array"] )
{	

		
	//debug message
	echo "Array sort completed";
	exit();
}



/**
 * Template Name: Parallax Showcase Page
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
		
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="parallax-showcase-page">

				<?php
				$loop = new WP_Query( array( 'post_type' => 'elegance_showcase', 'orderby' => 'date', 'order' => 'DESC', 'paged'=> false, 'posts_per_page' => '-1' ) );

		        
				$total_showcase_items = 0;
				$current_item_no = 0;
		        while ( $loop->have_posts() ) : $loop->the_post();
		        	
		        	$total_showcase_items++;
		        	
		        endwhile;

		        while ( $loop->have_posts() ) : $loop->the_post();
		        	$showcase_external_url      = get_post_meta( $post->ID,'elegance_showcase_link',true);
				  	$showcase_link_txt          = get_post_meta( $post->ID,'elegance_showcase_link_txt',true);
				  	$current_item_no = $current_item_no + 1;
				?>
					

					<section class="parallax-layer parallax-showcase-item std-showcase-item-0<?php echo esc_attr($current_item_no);?>">
						<div class="container-fluid">
							<div class="row">
								<article class="text-center col-md-12 fullheight inner-overlay">
									<div class="valign">
										<div class="crest">
											<h1 class="font2 white"><?php echo get_the_title(); ?></h1>
											<div class="caps-link">
												<a href="<?php echo esc_url($showcase_external_url);?>" class="explore font4 color ease"><?php echo $showcase_link_txt;?></a>
											</div>
										</div>
									</div>
								</article>
							</div>
						</div>
					</section>
					<!-- item:ends -->
				<?php
				endwhile;
				?>
			

		</section>
	<?php
	endwhile;
	

endif;


get_footer();

?>