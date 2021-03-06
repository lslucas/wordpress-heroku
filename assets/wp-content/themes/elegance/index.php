<?php
if ( isset($_GET['debug']) ) var_dump('test');
get_header();	
 $elegance_options = get_option('elegance_wp');


 	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts(array('post_type' => 'post', 'paged' => $paged));
	  
      $blog_post_list = '';        
      
      

      if ( have_posts() ) while ( have_posts() ) : the_post(); 
        if(is_sticky()){ 
          $sticky_icon = '<img src="'.esc_url(get_theme_root_uri().'/elegance/images/post_format/sticky_flipped.png').'" class="sticky-icon" alt="sticky post" />'; 
        } 
        else
          $sticky_icon = '';

      	$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.esc_url(get_category_link( $category->term_id )).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'elegancelang' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		}

		if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
           $thumb_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true, '' );
           $featured_image = '<img src="'.esc_url($thumb_img_src[0]).'" class="img-responsive" alt="'.esc_attr(get_the_title()).'"/>';
        }
        else
        	$featured_image = '';

        $blog_post_list .= '<div class="news-item news-item-one-third">
					            '.$featured_image.'
					            <div class="news-listing-item white-bg">
					              '.$sticky_icon.'
					              <h5 class="font4 color">'.get_the_time('j M, Y').'</h5>
					              <h6><span class="dark">'.get_the_author().' / '.trim($output, $separator).'</span></h6>
					              <h3 class="font3 dark">'.get_the_title().'</h3>
					              <p>'.elegance_clean(get_the_excerpt(), 250).'</p>
					              <a href="'.esc_url(get_the_permalink()).'" class="btn btn-elegance btn-elegance-dark">'. __('Read Full Post', 'elegancelang').'</a>
					            </div>
					    	</div>';
       
      endwhile;

   ?>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="white-bg pad-top">
			<div class="container-fluid">
			    <div class="row add-bottom">
			        <article class="text-center col-md-8 col-md-offset-2 white-bg services-content">
			            <div class="page-head">
			              <h1><span class="font2 black"><?php echo $elegance_options['archive_heading'];?></span></h1>
			            </div>
			            <?php
			            if($elegance_options['archive_promo_txt'] != '')
			            {
			            ?>
			            <div class="text-center add-top-half">
			              <p class="promo-text font4 color add-top-quarter"><?php echo $elegance_options['archive_promo_txt'];?></p>
			            </div>
			            <?php
			        	}
			            ?>
			        </article>
			    </div>
			</div>
			<div class="container-fluid">
			    <div class="row">
			      <div id="news-container" class="news-container whitegray-bg clearfix">
			      	<?php echo $blog_post_list;?>
			      </div>
			    </div>
			</div>
			
			
			<section class="blog-pagination-section-wrap">
				<div class="row">

				  	<article class="col-md-12 no-pad works-single-nav">

				      	<div class="works-single-nav-inner">
				            <div class="row">
				              <article class="col-md-12 news-nav text-center">
				                    <?php elegance_getpagenavi(); ?>
				              </article>  
				            </div>
				      	</div>
				  	</article>

				</div>

			</section>
			
		</section>
	<?php


	wp_enqueue_script( 'elegance-isotope' );
    wp_enqueue_script( 'elegance-blog-isotope-init' );


get_footer();

?>