<?php

    $elegance_options = get_option('elegance_wp');

?>

</section>
<!-- Inner Master Wrap : ends -->
<?php
if($elegance_options['foot_twitter_id'] != '') 
{
?>
<section class="tweet-feed-wrap white-bg">

     <div class="container">
          <div class="row">
               <article class="col-md-10 col-md-offset-1">
                    <img alt="" title="" src="<?php echo esc_url(get_theme_root_uri().'/elegance/images/twitter.png');?>"/>
                    <article id="ticker" class="tweets-ticker query"></article> 
               </article>
          </div>
     </div>

</section>
<?php
     wp_enqueue_script( 'tweet-js' );
     wp_enqueue_script( 'tweet-init' );

     $twitter_options = array( 'twitter_id' => $elegance_options['foot_twitter_id'], 'path' => esc_url(get_theme_root_uri().'/elegance/'));
     wp_localize_script('tweet-init', 'tweetobj', $twitter_options);
}
?>

<footer id="mastfoot" class="mastfoot white-bg">

     <div class="container">
          <div class="row">
               <article class="text-left col-md-6">
                    <div class="foot-logo">
                         <?php 
                         if($elegance_options['footer_logo'] != '') 
                         {
                         ?>
                         <a href="#"><img class="ease" src="<?php echo esc_url($elegance_options['footer_logo']);?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/></a>
                         <?php 
                         }
                         ?> 
                    </div>
               </article>
               <article class="text-right col-md-6">
                    <h6 class="foot-caps font1"><?php echo $elegance_options['foot_site_title'];?></h6>
                    <p class="credits"><?php echo $elegance_options['credit'];?></p>
               </article>
          </div>
     </div>

</footer>



</section>
<!-- Master Wrap : ends -->

<?php


	wp_footer();
?>
</body>
</html>
