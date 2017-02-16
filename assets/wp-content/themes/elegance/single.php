<?php
get_header();


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();

		$elegance_embed_code = get_post_meta($post->ID,'post_embed_code',true);
		$elegance_header_image = get_post_meta($post->ID,'post_header_bg',true);
		$elegance_embed_code = str_replace("&rsquo;","'",$elegance_embed_code);
		$elegance_embed_code = str_replace("&quot;",'"',$elegance_embed_code);
        
        /*
		$elegance_post_feature_content = '';

		if(get_post_type( get_the_ID()) == 'post'){
		     if(get_field('slideshow') != null){
		     	$elegance_post_feature_content = '<div class="single-project-slider-wrap">
								                      <ul class="single-project-slider bxslider">';
		            
		            $elegance_first_slide = true;
		            $images = get_field('slideshow');
                 
		            foreach($images as $image)
		            {
		              if($elegance_first_slide == true)
		                $elegance_item_active = 'active';
		              else
		                $elegance_item_active = '';

		              $elegance_post_feature_content .= '<li><img src="'.$image['url'].'" class="img-responsive" alt="'.get_the_title().'" title="'.get_the_title().'" /></li>';
		              
		              $elegance_first_slide = false;
		            }
		        $elegance_post_feature_content .='</ul></div>';
		     } 
        } 
        */

        $elegance_post_feature_gallery = '';

		if(get_post_type( get_the_ID()) == 'post'){
		     if(get_field('slideshow') != null){
                 $images = get_field('slideshow');
                    $i=0;
		            foreach($images as $image){
				$photos[] = $image['url'];
                      if ( $i==0 )
                          $slide_list .= '<article class="no-pad single-project-block">';
                          //$slide_list .= '<article class="col-md-3 col-xs-6 single-project-block no-pad">';
                      $slide_list .= '  <div class="whitegray-bg">
                                          <a  class="venobox zoom" data-gall="'.strtolower(str_replace(' ', '-', $gallery_name)).'-gallery" href="'.$image['url'].'">
                                            <img alt="" title="" class="img-responsive" src="'.$image['sizes']['presence_portfolio_thumb'].'" />
                                            <div class="zoom-icon-wrap"></div>    
                                          </a>
                                        </div>';

                      if ( $i==3 ) {
                          $slide_list .= '</article>';
                          $i=0;
                      } else {
                          $i++;
                      }
                    }

	                 $elegance_post_feature_gallery = $slide_list;
		      }
                
        } 


	?>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="page-bg white-bg fullheightmin <?php post_class(); ?>">
			<div class="container-fluid">
				<div class="container">
					<div class="row pad-top">
						<article class=" col-md-12 white-bg about-content">
							<div class="add-bottom-half post-heading">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <?php if(in_category( '1' )){ ?>
                                       <p class="text-right"><a href="<?php echo esc_url( home_url( '/historias' ) ); ?>" class="btn btn-elegance btn-elegance-black">Voltar para Histórias</a></p>
                                        <?php } elseif(in_category( '48' )) { ?>
                                       <p class="text-right"><a href="<?php echo esc_url( home_url( '/ensaios' ) ); ?>" class="btn btn-elegance btn-elegance-black">Voltar para Ensaios</a></p>                                                 
                                        <?php } ?>
                                    </div>
                                </div>
							</div>
						</article>
					</div>
				</div>
			</div>
			<div class="container-fluid">
                <?php if(count($photos)==1 || in_category('48') && ($elegance_post_feature_gallery)){ ?>
                <div class="vc_row wpb_row vc_row-fluid">
                    <div class="vc_col-sm-12 wpb_column vc_column_container">
		                  <div class="wpb_wrapper">
                                <div class="feature-content-area">
                                    <div class="featured-image"> 
                                            <?php echo $elegance_post_feature_gallery; ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php 
			}
		?>
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<article class="blog-post post-content-area">
                                <?php if(in_category( '1' )){ ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="feature-content-area">
                                                <div class="featured-image"> 
                                                    <?php
                                                        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
                                                           $thumb_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true, '' );
                                                           echo '<img src="'.esc_url($thumb_img_src[0]).'" class="img-responsive" alt="'.esc_attr(get_the_title()).'"/>';
                                                        }      
                                                    ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>  
				                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="border-bottom: 1px solid #CCC;">
                                        <h1 class=""><span class="font3 black"><?php echo get_the_title();?></span></h1>
                                        <h5 class="dark post-attr font4">
                                            <span><?php the_time('M, Y'); ?></span>
                                        </h5>
                                        <h4><?php echo get_the_excerpt(); ?></h4>
                                        </div>
                                    </div>
                                </div>                                
				              <div class="row">
				                <div class="col-md-12">
				                  <div class="inner-page-content entry"><?php 
				                  		$content = get_the_content();
										$content = apply_filters('the_content', $content);
										echo $content;
				                  ?></div>
				                  <div class="liner-thin liner-normal text-center"><span class="highlight-bg"></span></div>
                <?php if(!in_category('48') && ($elegance_post_feature_gallery) && count($photos)>1){ ?>
		<h3>Galeria de Fotos</h3>
                <div class="vc_row wpb_row vc_row-fluid">
                    <div class="vc_col-sm-12 wpb_column vc_column_container">
		                  <div class="wpb_wrapper">
                                <div class="feature-content-area">
                                    <div class="featured-image" id='photos'> 
                                            <?php echo $elegance_post_feature_gallery; ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

				                  <div class="post_footer">
				                        <div class="post-tags"><?php  the_tags(' ', ' ', ''); ?></div>
				                        <div class="hidden"><?php wp_link_pages(); ?></div>
				                  </div>
				                </div>
				              </div>

				            </article>
						</div>
					</div>
				</div>
			</div>
			<?php
		    if(comments_open())
		    {
		    ?>
		    <!-- inner-section : starts -->
		    <section class=" pad-bottom  white-bg comments-wrap container-fluid">
		      <div class="container">

		            <div class="row">
		              <div class="col-md-8">
		                <?php comments_template( '', true ); ?>
		              </div>
		            </div>
		      </div>
		    </section>
		    <?php  
		    }
		    
		    ?>
		    <section class="pad-top pad-bottom container-fluid">
		      <div class="container">
		        <div class="row blog-pagination-wrap">
		          <div class="col-md-8 text-center">
		            <div id="blog_pagination" class="blog_pagination post_nav pad-bottom-medium font4">
		              <div class="clear"></div>
                        <?php
                            if(in_category( '1' )){
                                $next_text = 'Proxima História';
                                $prev_text = 'História Anterior';
                            } elseif(in_category( '48' )){
                                $next_text = 'Proximo Ensaio';
                                $prev_text = 'Ensaio Anterior';
                            } else {
                                $next_text = 'Proximo';
                                $prev_text = 'Anterior';    
                            }
                         ?>
		              <?php previous_post_link( '%link', $next_text , TRUE ); ?>
		              <?php next_post_link( '%link', $prev_text, TRUE ); ?>
		              <div class="clear"></div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </section>
		</section>
	<?php

	endwhile;
	

endif;
?>	

<style type='text/css'>
#photos {
  /* Prevent vertical gaps */
  line-height: 0;
   
  -webkit-column-count: 5;
  -webkit-column-gap:   0px;
  -moz-column-count:    5;
  -moz-column-gap:      0px;
  column-count:         5;
  column-gap:           0px;  
}

#photos img {
  /* Just in case there are inline attributes */
  width: 100% !important;
  height: auto !important;
}
@media (max-width: 1200px) {
  #photos {
  -moz-column-count:    4;
  -webkit-column-count: 4;
  column-count:         4;
  }
}
@media (max-width: 1000px) {
  #photos {
  -moz-column-count:    3;
  -webkit-column-count: 3;
  column-count:         3;
  }
}
@media (max-width: 800px) {
  #photos {
  -moz-column-count:    2;
  -webkit-column-count: 2;
  column-count:         2;
  }
}
@media (max-width: 400px) {
  #photos {
  -moz-column-count:    1;
  -webkit-column-count: 1;
  column-count:         1;
  }
}
</style>
<?php
get_footer();
?>