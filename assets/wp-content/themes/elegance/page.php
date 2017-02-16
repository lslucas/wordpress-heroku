<?php
get_header();


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		$page_promo_text = get_post_meta(get_the_ID(), 'page_promo_text',true);
	?>
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="page-bg white-bg <?php echo esc_attr(elegance_vc_active_class());?>">
			<?php
				get_template_part('shop-header');
			?>
			<div class="container-fluid fullheightmin">
				<div class="row pad-top">
					<article class="text-center col-md-8 col-md-offset-2 white-bg about-content">
						<div class="page-head add-bottom-half">
							<h1><span class="page-heading font1"><?php echo get_the_title();?></span></h1>
						</div>
						<?php
						if($page_promo_text != '')
						{
						?>
						<div class="text-center">
							<p class="promo-text font4 color add-top-quarter"><?php echo $page_promo_text;?></p>
						</div>
						<?php
						}
						?>
					</article>
				</div>
				<div class="row elegance-main-content-area">
					<?php
					the_content();
					?>
<?php 
if ( isset($_GET['debug']) ) echo 'lslucas';
$images = get_field('gallery');

if( $images ): ?>
    <ul>
        <?php foreach( $images as $image ): ?>
            <li>
                <a href="<?php echo $image['url']; ?>">
                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
                <p><?php echo $image['caption']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
				</div>
				<?php
				if(comments_open())
			    {
			    ?>
				    <!-- inner-section : starts -->
				    <section class=" pad-bottom pad-top  white-bg comments-wrap">
				      <div class="container">
						<div class="row">
			              <div class="col-md-8">
			                <?php comments_template( '', true ); ?>
			              </div>
			            </div>
				      </div>
				    </section>
				    <div class="hidden"><?php wp_link_pages(); ?></div>
			    <?php  
			    }
			    
			    ?>
			</div>
		</section>
	<?php
	endwhile;
	

endif;
	
	


get_footer();
?>