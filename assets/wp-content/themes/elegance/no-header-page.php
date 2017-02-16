<?php 



if ( $_REQUEST["array"] )
{	

		
	//debug message
	echo "Array sort completed";
	exit();
}




/**
 * Template Name: No Header Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_bg_color = get_post_meta(get_the_ID(), 'page_bgcolor',true);
		if($page_bg_color == '')
			$page_bg_color = '#FFF';
	?>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="page-bg" style="background:<?php echo esc_attr($page_bg_color);?>;">
			<div class="container-fluid">
				<div class="row">
					<?php
					the_content();
					?>
				
				</div>
			</div>
		</section>
	<?php
	endwhile;
	

endif;


get_footer();

?>