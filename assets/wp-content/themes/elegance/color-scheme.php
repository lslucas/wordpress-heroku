<?php
 $elegance_options = get_option('elegance_wp');
 
 $color = $elegance_options['highlight_color'];
 $rgb_code = elegance_get_rgb($color);
 $colorRGBA = 'rgba('.$rgb_code[0].','.$rgb_code[1].','.$rgb_code[2].',0.8)';
 $white = '#FFFFFF';
 $softwhite = '#FAFAFA';
 $whitegray = '#EBEBEB';
 $silver = '#CCCCCC';

 $dark = '#282B2D';
 $black = '#121214';

 $darkTrans = 'rgba(0,0,0,0.4)';
 $whiteTrans = 'rgba(255,255,255,0.4)';

$elegance_color_scheme = '
.white{
	color: '.$white.';
}
.wpb_row{
	margin-bottom: 0px;
}

.softwhite{
	color: '.$softwhite .';
}
.whitegray{
	color: '.$whitegray .';
}
.dark{
	color: '.$dark .';
}
.black{
	color: '.$black .';
}
.silver{
	color: '.$silver  .';
}
.color, .highlight{
	color: '.$color .';
}

.white-bg{
	background: '.$white .';
}
.softwhite-bg{
	background: '.$softwhite .';
}
.whitegray-bg{
	background: '.$whitegray .';
}
.dark-bg{
	background: '.$dark .';
}
.black-bg{
	background: '.$black .';
}
.silver-bg{
	background: '.$silver .';
}
.color-bg, .highlight-bg{
	background: '.$color .';
}
.dark-trans-bg{
	background: '.$darkTrans .';
}
.white-trans-bg{
	background: '.$whiteTrans .';
}

a{
	color: '.$black .';
}
a:hover{
	color: '.$color .';
}
::selection {
  background:  '.$color .';
  color: '.$white .';
}
::-moz-selection {
  background:  '.$color .';
  color: '.$white .';
}
.main-nav-inner{
	border-color: '.$whitegray .';
}
.mastnav li>a:hover{
	color: '.$color .';
}
.sub-nav a{
	background: '.$color .';
	color: '.$white .';
}
.sub-nav a:hover{
	background: '.$black .';
	color: '.$white .';
}
.nav-highlight{
	color: '.$color .' !important ;
}
.intro a.explore:hover{
	color: '.$black .';
}
.intro h1>span{
	border-color: '.$dark .';
}
.intro-04 .crest{
	border-color: '.$whitegray .';
}
.intro-05 .crest{
	border-color: '.$whitegray .';
}
.intro-07 .crest{
	border-color: '.$whitegray .';
}
.intro-08 .crest{
	border-color: '.$whitegray .';
}
.intro-09 a.explore{
	color: '.$color .';
}
.intro-09 a.explore:hover{
	color: '.$black .';
}
.page-head h1 > span{
	border-color: '.$dark .';
}
.call-to-action h3.white > span{
	border-color: '.$whitegray .';
}
.feature-block{
	border-color: '.$color .';
}
.stats-item.dark-stats{
	border-color: '.$black .';
}
.stats-item.white-stats{
	border-color: '.$white .';
}
.stats-item.highlight-stats{
	border-color: '.$color .';
}
.works-filter li a > span{
	color: '.$color .';
}
.works-filter li:after{
	color: '.$silver .';
}
.works-item-inner h3{ 
	color: '.$black .';
}
.works-item-inner p > span{  
	color: '.$white .';
	background-color: '.$color .';
}

.works-nav a > span{
	border-color: '.$white .';
}

.works-nav a:hover > span{
	border-color: '.$color .';
	color: '.$white .';
}

.blog_pagination a {
	border-color: '.$dark .';
	color: '.$color.';
}

.blog_pagination a:hover{
	border-color: '.$black .';
	color: '.$black .';
}

.news-listing-item{
	border-color: '.$dark .';
}
.news-nav a > span{
	border-color: '.$white .';
}

.news-nav a:hover > span{
	border-color: '.$color .';
	color: '.$silver .';
}

.contact-content h6 > a > span{
	border-color: '.$white .';
	color: '.$white .';
}
.contact-content h6 > a:hover > span{
	border-color: '.$color .';
	background-color: '.$color .';
	color: '.$white .';
}
.alert > p{
	color: '.$white .';
}
input[type="text"], input[type="password"], textarea {
	border-color: '.$black .' !important;
}
input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
	border-color: '.$dark .' !important;
}
.tweet-feed-wrap{
	border-color: '.$whitegray .';
}
.btn-elegance-dark{
	background-color: '.$black .';
}
.btn-elegance-black{
	background-color: '.$dark .'!important;
}
.btn-elegance-white{
	background-color: '.$whitegray .';
}
.btn-elegance-color{
	background-color: '.$color .';
}

.wp-caption-text a{ color: '.$color.';}

/*SHOP PAGE ONLY*/

.sidebar-list li > a{
	color: '.$dark .';
}
.sidebar-list li > a:hover{
	color: '.$color .';
}
.shop-item-info > .btn, .shop-item-cart > .btn{
	border-color: '.$whitegray .';
}
.shop-item-info > .btn:hover, .shop-item-cart > .btn:hover{
	border-color: '.$black .';
	background-color: '.$black .';
}
.product-details-content h4 > span, .woocommerce-page.single-product .product .price ins span, .woocommerce-page.single-product .product .price > span{
	border-color: '.$color .';
}
.woocommerce-page.single-product .product .price del span{
	border-color: '.$silver.';
}
.product-details-content h4 a{
color: '.$dark .';
}
.contact-page-bg{background: url('.$elegance_options['cnt_bg'].')}
.agency-showcase-page .owl-theme .owl-controls .owl-page span{
    opacity: 1 !important; 
    background-color: '.$color .' !important;
}
.yt-poster-img{
	background: url('.$elegance_options['youtube_vdo_poster_img'].');
}
.vimeo-poster-img{
	background: url('.$elegance_options['vimeo_vdo_poster_img'].');
}
.menu-bg{
    background-image:url('.$elegance_options['sliding_nav_bg'].');
}
.md-overlay{background: rgba(0,0,0,0.8) url('.esc_url(get_theme_root_uri().'/elegance/images/modal-loader.gif').') center center no-repeat;}
.woocommerce .address .edit:hover, .woocommerce-page .button:hover{
	background: '.$color .' !important;
}
.woocommerce-checkout .woocommerce-info a{
	color: '.$color .';
	text-shadow: none;
}
p.myaccount_user a{ color: '.$color.' !important;}
.woocommerce mark{background: '.$color.'; padding: 5px 10px;}
.shopping_cart_dropdown a.view-cart:hover{
	background: '.$color.';
	border-color: '.$color.';
	color: #FFF;
}';


$showcase_loop = new WP_Query( array( 'post_type' => 'elegance_showcase', 'orderby' => 'date', 'order' => 'DESC', 'paged'=> false, 'posts_per_page' => '-1' ) );

  $current_showcase_item_no = 0;
  while ( $showcase_loop->have_posts() ) : $showcase_loop->the_post();
    
    $current_showcase_item_no++;
    $showcase_bg_image = get_field( 'elegance_showcase_bg_image', $showcase_loop->post->ID);

    $elegance_color_scheme .= '.std-showcase-item-0'.$current_showcase_item_no.'{
      background-image:url('.$showcase_bg_image.');
    }';
    
  endwhile;

?>