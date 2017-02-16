<?php

/**
 * Template Name: Standard Showcase Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');

if ( isset($_GET['debug']) ) var_dump('standard-showcase');
if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_bg_img = get_post_meta(get_the_ID(), 'parallax_bg',true);
		$page_bg_color = get_post_meta(get_the_ID(), 'page_bgcolor',true);
?>
<?php
/*
<div class='videoWrapper'>
<iframe id='video' src="https://player.vimeo.com/video/138672324?autoplay=1&loop=1&title=0&byline=0" width="1148" height="675" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<style type='text/css'>
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
*/
	?>	
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="std-showcase-page full-height">

			<div class="fullscreen-carousel owl-carousel owl-nav-sticky-wide full-height">
				<?php
				$loop = new WP_Query( array( 'post_type' => 'elegance_showcase', 'orderby' => 'date', 'order' => 'ASC', 'paged'=> false, 'posts_per_page' => '-1' ) );

		        
				$total_showcase_items = 0;
				$current_item_no = 0;
		        while ( $loop->have_posts() ) : $loop->the_post();
		        	
		        	$total_showcase_items++;
		        	
		        endwhile;

		        while ( $loop->have_posts() ) : $loop->the_post();
		        	$showcase_bg_image          = get_field('elegance_showcase_bg_image',$post->ID);
				  	$showcase_caption           = get_post_meta( $post->ID,'elegance_showcase_caption',true);
				  	$showcase_external_url      = get_post_meta( $post->ID,'elegance_showcase_link',true);
				  	$showcase_link_txt          = get_post_meta( $post->ID,'elegance_showcase_link_txt',true);
				  	$current_item_no = $current_item_no + 1;
				?>
					<div id="<?=$post->ID?>" class="item std-showcase-carousel-item text-right fullheight std-showcase-item-0<?php echo esc_attr($current_item_no);?>">
						<div class="inner-overlay pad-inner fullheight">
							<div class="valign">
                                <?php if($showcase_caption){?>
								    <h5 class="font2"><span class="dark-bg white"><?php echo $showcase_caption;?></span></h5>
                                <?php } ?>
                                <?php if($meta_showcase_title == 1){ ?>
								    <h1 class="font2 black col-md-4 col-md-offset-8"><?php echo get_the_title(); ?></h1>
                                <?php } ?>
								<div class="caps-link"><span><a href="<?php echo $showcase_external_url;?>" class="explore font4 dark ease"><?php echo $showcase_link_txt;?></a></span></div>
							</div>
							<div class="caps-count">
								<p class="font3 white">
									<span class="font3 white"><?php echo $current_item_no;?></span>/<span class="font3 white"><?php echo $total_showcase_items;?></span>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script type='text/javascript'>
$(function() {
	vidW = $('.inner-mastwrap').width() || 1148;
	vidH = $('.inner-mastwrap').height() || 674;
	$('iframe#video').css({'width': vidW+'px', 'height': (vidH-67)+'px'});
});
</script>