<?php
@session_start();
/*
if ( isset($_GET['nolanding']) && $_GET['nolanding']==1 ) {
    $_SESSION['nolanding'] = true;
}
if ( isset($_GET['nolanding']) && $_GET['nolanding']==0 ) {
    unset($_SESSION['nolanding']);
}
*/
// temporário
/*if ( !isset($_SESSION['nolanding']) || !$_SESSION['nolanding'] ) {
	include_once 'landing-page.php';
	exit;
}*/

    $elegance_options = get_option('elegance_wp');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<title><?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<?php

    elegance_favicon();
    elegance_google_font();

?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php echo esc_url(get_theme_root_uri().'/elegance/bootstrap/js/html5shiv.js');?>"></script>
  <script src="<?php echo esc_url(get_theme_root_uri().'/elegance/bootstrap/js/respond.min.js');?>"></script>
<![endif]-->



 

<?php

    
    if($post)
    elegance_vc_custom_style($post); 
    
    wp_head();  

?>

</head>


<body <?php body_class('whitegray-bg'); ?>>

    <!-- Master Wrap : starts -->
<section id="mastwrap">

<div class="mobile-nav-logo hidden-lg hidden-md hidden-sm hidden-xs">
    <?php 
    if($elegance_options['mobile_nav_logo'] != '') 
    {
    ?>
        <img src="<?php echo esc_url($elegance_options['mobile_nav_logo']);?>"  alt=""/>
    <?php 
    }
    ?>
    
</div>
<nav class="mobile-nav hidden-lg">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'slimmenu' ) ); ?>
            
</nav>

<!-- Masthead : starts -->
<header id="masthead" class="masthead visible-lg shadowy menu-bg fullheightmin covered-bg">
    <!-- Masthead-inner : starts -->
    <section class="masthead-inner white-bg">


    <div class="menu-trigger">
        <div id="nav-icon" class="visible-yes">
          <span class="black-bg"></span>
          <span class="black-bg"></span>
          <span class="black-bg"></span>
          <span class="black-bg"></span>
          <span class="black-bg"></span>
          <span class="black-bg"></span>
        </div>
    </div>


    <nav class="main-nav-wrap red-bg text-center">
        <div class="mastnav halfheight">
                <div class="valign">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'md-nav standard-nav standard-nav-dark-text default-wp-nav-menu' ) ); ?>
                </div>
        </div>
    </nav>

    <ul class="social-wrap">
        <?php 
        if($elegance_options['social_media_email'] != '') 
        {
        ?>
        <li><a href="mailto:<?php echo $elegance_options['social_media_email']; ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/email.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_twitter'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_twitter']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/twitter.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_dribble'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url( $elegance_options['social_media_dribble']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/dribble.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_facebook'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_facebook']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/facebook.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_gplus'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_gplus']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/google.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_linkedin'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_linkedin']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/linkedin.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_pintrest'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_pintrest']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/pintrest.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_behance'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_behance']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/behance.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_github'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_github']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/github.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_flickr'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_flickr']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/flickr.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_tumblr'] != '') 
        {
        ?>
        <li><a href="<?php echo $elegance_options['social_media_tumblr']; ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/tumblr.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_soundcloud'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_soundcloud']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/soundcloud.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_instagram'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_instagram']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/instagram.png');?>"/></a></li>
        <?php 
        }
        if($elegance_options['social_media_vimeo'] != '') 
        {
        ?>
        <li><a href="<?php echo esc_url($elegance_options['social_media_vimeo']); ?>" target="_blank"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>"  src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/social_icons/vimeo.png');?>"/></a></li>
        <?php 
        }
        ?> 
    </ul>


    <div class="main-logo text-center">
        <?php 
        if($elegance_options['sliding_nav_logo'] != '') 
        {
        ?>
        <a href="#"><img src="<?php echo esc_url($elegance_options['sliding_nav_logo']);?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
        <?php 
        }
         
        ?>
    </div>
        
    </section>
    <!-- masthead-inner:ends -->

</header>
<!-- masthead:ends -->


<section class="inner-mastwrap">

