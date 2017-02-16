<?php
	$elegance_options = get_option('elegance_wp');

	
	
	
?>

<section class="shop-header white-bg">
  <h3 class="dark font1"><?php echo $elegance_options['shop_heading'];?> <span class="color font4"><?php echo $elegance_options['shop_name'];?></span></h3>
  <div class="elegance-woocommerce-widget-area">
  	<?php
  		if(is_active_sidebar('elegance_side')) {
            dynamic_sidebar('elegance_side');
        }
  	?>
  </div>
  
</section>