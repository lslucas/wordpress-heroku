<?php 

/**
 * Template Name: Contact Page
 *
 * @author Designova (designova.net)
 * @theme Elegance
*/
 get_header();	
 $elegance_options = get_option('elegance_wp');


if ( have_posts() ) :
	// Start the Loop.
	while ( have_posts() ) : the_post();
	
		
	?>
		
		<section id="page-<?php echo esc_attr(get_the_ID()); ?>" class="page-bg fullheightmin parallax-layer contact-page-bg" >

			<div class="container-fluid">
				<div class="row">
					<article class="text-center col-md-6 equal-height fullheightmin fullheight contact-content-overlay">
						<div class="valign">
							<div class="contact-content text-center">
								<?php
								if($elegance_options['contact_logo'] != '')
								{
								?>
									<img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" src="<?php echo esc_url($elegance_options['contact_logo']);?>"/>
								<?php
								}
								if($elegance_options['cnt_site_name'])
								{
								?>
									<h3 class="font2 white"><?php echo $elegance_options['cnt_site_name'];?></h3>
								<?php
								}
								if($elegance_options['cnt_address'])
								{
								?>
									<p class="font3 white"><?php echo $elegance_options['cnt_address'];?></p>
								<?php
								}
								if($elegance_options['cnt_mail_id'])
								{
								?>
									<h6><a href="mailto:<?php echo $elegance_options['cnt_mail_id'];?>"><span class="font2 white"><?php echo $elegance_options['cnt_mail_id'];?></span></a></h6>
								<?php
								}
								?>
							</div>
						</div>
					</article>

					<article class="text-center col-md-6 equal-height fullheightmin fullheight side-pad white-bg">
						<div class="valign">
							<div id="contact-form-wrap">
						        <div class="contact-item pad-common ">
						            <div class="alert alert-error error " id="fname">
						              <p><?php echo $elegance_options['name_err_msg'];?></p>
						            </div>
						            <div class="alert alert-error  error" id="fmail">
						              <p><?php echo $elegance_options['email_err_msg'];?></p>
						            </div>
						            <div class="alert alert-error  error" id="fmsg">
						               <p><?php echo $elegance_options['message_err_msg'];?></p>
						            </div>
						            <form name="myform" id="contactForm" action="<?php echo esc_url(get_theme_root_uri().'/elegance/sendmail.php');?>" enctype="multipart/form-data" method="post"> 
						                <input type="hidden" name="receiver" id="receiver" value="<?php echo esc_attr($elegance_options['contact_email']);?>" />
			                            <input type="hidden" id="subject" name="subject" value="<?php echo esc_attr($elegance_options['contact_email_sub']);?>"/>
			                            <input type="text" name="website_url" id="website_url" class="contact_web_url " value=""/> 
			                              
						                <article>
						                  <input type="text" placeholder="<?php echo esc_attr($elegance_options['name_placeholder']);?>" id="name" name="name" size="100" class="border-form">
						                </article>
						                <article>
						                   <input type="text" placeholder="<?php echo esc_attr($elegance_options['email_placeholder']);?>" name="email" id="email" size="30" class="border-form">
						                </article>
						                <article>
						                  <textarea placeholder="<?php echo esc_attr($elegance_options['message_placeholder']);?>" name="message" cols="40" rows="3" id="msg" class="border-form"></textarea>
						                  <div class="btn-wrap  text-left">
						                    <button class="btn btn-elegance btn-elegance-black" id="submit" name="submit" type="submit"><?php echo $elegance_options['submit_btn_txt'];?></button>
						                  </div>
						                </article>
						            </form>
						        </div>
						    </div>
						</div>
					</article>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row">
					<?php
					the_content();
					?>
				</div>
			</div>	
			
		</section>
		
		<button class="md-trigger launch_modal hidden-lg hidden-md hidden-sm hidden-xs" data-modal="modal-5">Launch modal</button>
	    <div class="md-modal md-effect-5" id="modal-5">
			<div class="md-content">
				<h3><?php if($elegance_options['thanks_msg_header']){ echo $elegance_options['thanks_msg_header']; }?></h3>
				<div>
					<p class="align-center"><?php if($elegance_options['thanks_msg']){ echo $elegance_options['thanks_msg']; }?></p>
					<div class="clear add-top-small"></div>
					<button class="md-close btn btn-trinity btn-trinity-dark"><?php _e('Close','elegancelang');?></button>
				</div>
			</div>
		</div>
		<div class="md-overlay"></div>

	<?php
	endwhile;
	

endif;


get_footer();

?>