<?php
 get_header();	
 $elegance_options = get_option('elegance_wp');

if ( $_SERVER["REQUEST_URI"]=='/lar-mar-project' || $_SERVER["REQUEST_URI"]=='/lar-mar-project/' ) {
$content_post = get_post(1430); // lar mar project
$content = $content_post->post_content;
$content = preg_replace("/<img[^>]+\>/i", "", $content); 		
$content = preg_replace("/<iframe[^>]+\>/i", "", $content);             
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
}

      $blog_post_list = '';        
      
      if ( have_posts() ) while ( have_posts() ) : the_post(); 
        if(is_sticky()){ 
          $sticky_icon = '<img src="'.esc_url(get_theme_root_uri().'/elegance/images/post_format/sticky_flipped.png').'" class="sticky-icon" alt="sticky post" />'; 
        } 
        else
          $sticky_icon = '';

		$separator = ', ';
		$output = '';

		if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
           $thumb_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'presence_portfolio_thumb', true, '' );
           $featured_image = '<div class="cover"><img src="'.esc_url($thumb_img_src[0]).'" class="img-responsive" alt="'.esc_attr(get_the_title()).'"/></div>';
        }
        else
        	$featured_image = '';


        if(in_category( '1' )){
            $txt = 'Ler História';
        } elseif(in_category( '48' )) {
            $txt = 'Ver Ensaio';
        }

        $blog_post_list .= '<div class="news-item news-item-one-third">
                                <a href="'.get_the_permalink().'">
					            '.$featured_image.'
                                </a>
					            <div class="news-listing-item white-bg">
					              '.$sticky_icon.'
					              <h5 class="font4 dark">'.get_the_time('j M, Y').'</h5>
					              <h2 class="font3 black">'.get_the_title().'</h2>
                                  <p>'.get_the_excerpt().'</p>
					              <a href="'.get_the_permalink().'" class="btn btn-elegance btn-elegance-black">'.$txt.'</a>
					            </div>
					    	</div>';
       
      endwhile;

   ?>
<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="white-bg pad-top">
			<div class="container-fluid">
			    <div class="row add-bottom">
			        <article class="text-center col-md-8 col-md-offset-2 white-bg services-content">
			            <div class="page-head">
			              <?php single_cat_title( '<h1><span class="font1 black">', '</span></h1>' ); ?>
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
  			    <?php
				if ( isset($content) )
					echo $content;
			    ?>
			    <div class="row">
			      <div id="news-container" class="news-container clearfix">
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
				                    <?php //elegance_getpagenavi(); ?>
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

?>
<style type='text/css'>
.cover {
  width: 342px;
  height: 230px;
  overflow:hidden;
  background-color: black;
}
</style>
<?php
get_footer();

?>