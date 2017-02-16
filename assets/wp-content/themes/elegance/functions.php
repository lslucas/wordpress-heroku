<?php
/*--Basic Config calling---*/


//Theme Options
	require_once (dirname( __FILE__ ) . "/admin/theme-options.php" );
//Common functions
	require_once (dirname( __FILE__ ) . "/admin/common-functions.php" );

//Metaboxes
	require_once (dirname( __FILE__ ) . "/admin/custom-metabox.php" );
//Custom Post types
	require_once (dirname( __FILE__ ) . "/admin/custom-post-types.php" );








/*---------------------------------------
---------Elegance Initialiszation---------
-----------------------------------------*/
function elegance_setup() 
  {
		
		register_nav_menu('primary', __( 'Primary Navigation','elegancelang'));
		//register_nav_menu('elegance_nav', __( 'Elegance Navigation','elegancelang'));
		
		add_theme_support('post-thumbnails' );
		//add_theme_support('post-thumbnails', array('elegance-portfolio','post') );
		
		set_post_thumbnail_size( 300, 300, true ); // Standard Size Thumbnails
    
    //Feed links
		add_theme_support( 'automatic-feed-links' );
		
		
		//Sidebar
    $args = array(
    'name'          => __( 'Woocommerce Widget', 'elegancelang' ),
    'id'            => 'elegance_side',
    'description'   => '',
      'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s side_block">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="sub-heading"><span class="highlight-txt">',
    'after_title'   => '</span></h4>' );
    register_sidebar( $args ); 
		
		
		
        //Content width
		if ( ! isset( $content_width ) ) $content_width = 1140;
		//Initiate custom post types
    
		add_action( 'init', 'elegance_showcase_type' );
		
        
		
        //Load the text domain
		load_theme_textdomain('elegancelang', get_theme_root_uri() . '/languages');
  }

add_action( 'after_setup_theme', 'elegance_setup' );




/*---------------------------------------
--------Script and Style Enqueue---------
-----------------------------------------*/
global $elegance_pagenow;
if (!is_admin() AND 'wp-login.php' != $elegance_pagenow) 
{ 

    add_action( 'wp_enqueue_scripts', 'elegance_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_reg_tweet_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_portfolio_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_blog_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_reg_yt_video_bg_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_reg_vimeo_video_bg_scripts' );
    add_action( 'wp_enqueue_scripts', 'elegance_styles' );

}

else{
	 add_action( 'admin_enqueue_scripts', 'elegance_admin_scripts' );
	add_action( 'admin_enqueue_scripts', 'elegance_admin_styles' );
}




if ( is_singular() ) wp_enqueue_script( "comment-reply" );




function elegance_scripts() 
{ 

    $elegance_options = get_option('elegance_wp');

	
    wp_enqueue_script('jquery');
    wp_enqueue_script('easing', "http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js");
    wp_enqueue_script("core-script", get_theme_root_uri(). "/elegance/javascripts/libs/core.js",array(),false,true);
    wp_enqueue_script("bootstrap", get_theme_root_uri(). "/elegance/bootstrap/js/bootstrap.js",array(),false,true);
    wp_enqueue_script("preloader", get_theme_root_uri(). "/elegance/javascripts/libs/pace.min.js",array(),false,true);
    wp_enqueue_script("retina", get_theme_root_uri(). "/elegance/javascripts/libs/retina.js",array(),false,true);
    wp_enqueue_script("device-lib", get_theme_root_uri(). "/elegance/javascripts/libs/device.min.js",array(),false,true);
    wp_enqueue_script("classie", get_theme_root_uri(). "/elegance/javascripts/libs/classie.js",array(),false,true);
    wp_enqueue_script("waypoints", get_theme_root_uri(). "/elegance/javascripts/libs/waypoints.min.js",array(),false,true);
    wp_enqueue_script("hamburger-init", get_theme_root_uri(). "/elegance/javascripts/custom/hamburger-init.js",array(),false,true);
    wp_enqueue_script("owl-carousel", get_theme_root_uri(). "/elegance/javascripts/libs/owl.carousel.js",array(),false,true);
    wp_enqueue_script("form-validation", get_theme_root_uri(). "/elegance/javascripts/custom/form-validation.js",array(),false,true);
    wp_enqueue_script("modal-effects", get_theme_root_uri(). "/elegance/javascripts/libs/modalEffects.js",array(),false,true);
    wp_enqueue_script("veno-box", get_theme_root_uri(). "/elegance/javascripts/libs/venobox.min.js",array(),false,true);
    wp_enqueue_script("main-script", get_theme_root_uri(). "/elegance/javascripts/custom/main.js",array(),false,true);
    
    
    
    
	
}

function elegance_reg_tweet_scripts()
{
    wp_register_script("tweet-js", get_theme_root_uri(). "/elegance/javascripts/libs/jquery.tweet.js",array(),false,true);
    wp_register_script("tweet-init", get_theme_root_uri(). "/elegance/javascripts/custom/init-tweet.js",array(),false,true);

}

function elegance_portfolio_scripts()
{
    wp_register_script("elegance-isotope", get_theme_root_uri(). "/elegance/javascripts/libs/isotope.js",array(),false,true);
    wp_register_script("elegance-isotope-init", get_theme_root_uri(). "/elegance/javascripts/custom/isotope-init.js",array(),false,true);
}

function elegance_blog_scripts()
{
    wp_register_script("elegance-isotope", get_theme_root_uri(). "/elegance/javascripts/libs/isotope.js",array(),false,true);
    wp_register_script("elegance-blog-isotope-init", get_theme_root_uri(). "/elegance/javascripts/custom/isotope-news-init.js",array(),false,true);
}

function elegance_reg_yt_video_bg_scripts()
{
    wp_register_script("yt-player-lib", get_theme_root_uri(). "/elegance/javascripts/libs/jquery.mb.YTPlayer.js",array(),false,true);
    wp_register_script("youtube-video-init", get_theme_root_uri(). "/elegance/javascripts/custom/bgyoutube-init.js",array(),false,true);
}

function elegance_reg_vimeo_video_bg_scripts()
{
    wp_register_script("okvideo-lib", get_theme_root_uri(). "/elegance/javascripts/libs/okvideo.js",array(),false,true);
    wp_register_script("vimeo-video-init", get_theme_root_uri(). "/elegance/javascripts/custom/bgvimeo-init.js",array(),false,true);
    wp_register_script("vimeo-fix", get_theme_root_uri(). "/elegance/javascripts/libs/vimeo-fix.js",array(),false,true);
}

function elegance_admin_scripts()
{  
	wp_enqueue_script("uploader", get_theme_root_uri(). "/elegance/admin/options/js/uploader.js");
    wp_enqueue_script("farbtastic", get_theme_root_uri(). "/elegance/admin/options/js/farbtastic.js");
    wp_enqueue_script("farbtastic-invoke", get_theme_root_uri(). "/elegance/admin/options/js/color_picker_invoke.js");
    wp_enqueue_script("add-portfolio-slide", get_theme_root_uri(). "/elegance/admin/options/js/add-portfolio-slide.js",array(),false,true);
}


function elegance_styles() 
{
  

  wp_enqueue_style("elegance-bootstrap", get_theme_root_uri(). "/elegance/bootstrap/css/bootstrap.css");
  wp_enqueue_style("elegance-typography",get_theme_root_uri()."/elegance/fonts/fonts.css");
  wp_enqueue_style("elegance-preloader",get_theme_root_uri()."/elegance/stylesheets/pace.preloader.css");
  wp_enqueue_style("elegance-owl-carousel",get_theme_root_uri()."/elegance/stylesheets/owl.carousel.css");
  wp_enqueue_style("elegance-owl-theme",get_theme_root_uri()."/elegance/stylesheets/owl.theme.css");
  wp_enqueue_style("elegance-venobox",get_theme_root_uri()."/elegance/stylesheets/venobox.css");
  wp_enqueue_style("elegance-animate",get_theme_root_uri()."/elegance/stylesheets/animate.css");
  wp_enqueue_style("elegance-tweet",get_theme_root_uri()."/elegance/stylesheets/jquery.tweet.css");
  wp_enqueue_style("elegance-isotope",get_theme_root_uri()."/elegance/stylesheets/isotope.css");
  wp_enqueue_style("elegance-slimmenu",get_theme_root_uri()."/elegance/stylesheets/slimmenu.css");
  wp_enqueue_style("elegance-hamburger",get_theme_root_uri()."/elegance/stylesheets/hamburger.css");
  wp_enqueue_style("elegance-parallax",get_theme_root_uri()."/elegance/stylesheets/parallax.css");
  wp_enqueue_style("elegance-main",get_theme_root_uri()."/elegance/stylesheets/main.css");
  wp_enqueue_style("elegance-main-bg",get_theme_root_uri()."/elegance/stylesheets/main-bg.css");
  wp_enqueue_style("elegance-main-retina",get_theme_root_uri()."/elegance/stylesheets/main-retina.css");
  wp_enqueue_style("elegance-modal",get_theme_root_uri()."/elegance/stylesheets/md_modal.css");
  wp_enqueue_style("elegance-bx-slider",get_theme_root_uri()."/elegance/stylesheets/jquery.bxslider.css");
  wp_enqueue_style("elegance-shop",get_theme_root_uri()."/elegance/stylesheets/shop.css");
  wp_enqueue_style("elegance-style", get_stylesheet_directory_uri()."/style.css");
  wp_enqueue_style("elegance-main-responsive",get_theme_root_uri()."/elegance/stylesheets/main-responsive.css");
  
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active('js_composer/js_composer.php')) 
  {
    wp_enqueue_style("js_composer_front");
  }
  
  
  
}
function elegance_admin_styles()
{
 
  wp_enqueue_style("metastyles", get_theme_root_uri(). "/elegance/admin/options/css/meta-styles.css");  
  wp_enqueue_style("farbtastic-style", get_theme_root_uri(). "/elegance/admin/options/css/farbtastic.css");  
}


//Post formats
add_theme_support(
	'post-formats', array(
		'image',
		'audio',
		'link',
		'quote',
		'video'
	)
);





//WooCommerce Compatibility ---- Begins

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_theme_support( 'woocommerce' );

//WooCommerce Compatibility ---- Ends

//does woocommerce function exists?
if(function_exists("is_woocommerce")){
    //include woocommerce configuration
    //include cart dropdown widget
    include_once(dirname( __FILE__ ) . '/woocommerce-dropdown-cart.php');
}





function elegance_is_home_page(){
	if(is_front_page())
    {
    	if(is_page_template('the-onepage.php'))
    	{	
        	$is_home = true;
    	}
    	else
    	{
    		$is_home = false;
    	}
    }
    else
    {
      $is_home = false;
    }

    return $is_home;
}


function elegance_favicon(){
	
	$options = get_option('elegance_wp');

	if($options['fav_icon'] != '')
    { 

    	$fav_icon = '<link rel="shortcut icon" href="'.$options['fav_icon'].'">';
 
    }
    else
    {
    	$fav_icon = '';
    }

    echo $fav_icon;
}

function elegance_google_font(){
  $elegance_options = get_option('elegance_wp');
  if($elegance_options['google_font_url'] != '')
    echo $elegance_options['google_font_url'];
  else
    echo "<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,900%7COpen+Sans:400,300,700,800%7CMontserrat:400,700%7CCrimson+Text:400,700,400italic,700italic%7COswald:300,700,400' rel='stylesheet' type='text/css'>";
}

function elegance_custom_css(){
	$elegance_options = get_option('elegance_wp');
	wp_enqueue_style('custom-style',get_theme_root_uri() . '/elegance/stylesheets/custom-style.css');
	require_once(get_template_directory().'/color-scheme.php');
	require_once(get_template_directory().'/font-scheme.php');
	
	$elegance_custom_css = $elegance_color_scheme.' '.$elegance_font_scheme.' '.$elegance_options['additional_css'];

  
	
	wp_add_inline_style( 'custom-style', $elegance_custom_css );
}	

add_action( 'wp_enqueue_scripts', 'elegance_custom_css' );


function elegance_vc_custom_style($post){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active('js_composer/js_composer.php')) 
  {
    $post_custom_css = get_post_meta( $post->ID, '_wpb_post_custom_css', true );
    if ( ! empty( $post_custom_css ) ) {
      echo '<style type="text/css" data-type="vc_custom-css">';
      echo $post_custom_css;
      echo '</style>';
    }

    $shortcodes_custom_css = get_post_meta( $post->ID, '_wpb_shortcodes_custom_css', true );
    if ( ! empty( $shortcodes_custom_css ) ) {
      echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
      echo $shortcodes_custom_css;
      echo '</style>';
    }
  }
}

function elegance_vc_active_class(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active('js_composer/js_composer.php')) 
  {
    $return_class = 'elegance-vc-active';
  }
  else
  {
    $return_class = 'elegance-vc-inactive';
  }
  return $return_class;
}

function elegance_IE_fix()
{
	$ie_fix = '<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  <link href="'. get_theme_root_uri(). '"/elegance/stylesheets/ie8.css" rel="stylesheet">
	<![endif]-->';

	return $ie_fix;
}


function elegance_clean($excerpt, $substr=0) {
    $string = strip_tags(str_replace('[...]', '...', $excerpt));
    if ($substr>0) {
      $string = substr($string, 0, $substr);
    }
    return $string.' ...';
  }

function elegance_getpagenavi(){
  ?>
  <div id="blog_pagination" class="blog_pagination">
    <?php if(function_exists('wp_pagenavi')) : ?>
    <?php wp_pagenavi(); ?>
    <?php else : ?>
        <div class="archive-pagination-links">
          <span class="prev-entries font4"><?php next_posts_link(__('Previous Entries','elegancelang'), TRUE) ?></span>
          <span class="next-entries font4"><?php previous_posts_link(__('Newer Entries','elegancelang'), TRUE) ?></span>
        </div>
        <div class="clear"></div>
    <?php endif; ?>
    
  </div>
  <?php
  }



/*---------------------------------------
---------Format comment Callback-----------
-----------------------------------------*/

function format_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="panel clearfix cmntparent <?php
                        $authID = get_the_author_meta('ID');
                                                    
                        if($authID == $comment->user_id)
                           echo "cmntbyauthor";
                       else
                           echo "";
                        ?>">
			<div class="comment">


            				<div class="avatarbox">
            					<?php 
                                $defimg = get_stylesheet_directory_uri(). "/assets/img/human.png";
                                if(get_avatar($comment)):
                                	echo get_avatar($comment,$size='75');
                                else:
                                ?>
                                <img src="<?php echo $defimg; ?>"  alt="avatar" />
            					<?php endif; ?>
            				</div>
            				<div class="cmntbox">
            					<?php printf(__('<h4 class="">%s</h4>'), get_comment_author_link()) ?>
            					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
            					
            					<?php edit_comment_link(__('Edit','elegancelang'),'<span class="edit-comment">', '</span>'); ?>
                                
                                <?php if ($comment->comment_approved == '0') : ?>
                   					<div class="alert-box success">
                      					<?php _e('Your comment is awaiting moderation.','elegancelang') ?>
                      				</div>
            					<?php endif; ?>
                                
                                <?php comment_text() ?>
                                
                                <!-- removing reply link on each comment since we're not nesting them -->
            					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div>


			</div>
		</article>

<?php
}
function awesome_comment_form_submit_button($button) 
{
	$button =
		'<input name="submit" type="submit" class="form-submit" tabindex="5" id="[args:id_submit]" value="[args:label_submit]" />' .
		get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'awesome_comment_form_submit_button');

function elegance_get_rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}



function elegance_gradient($HexFrom, $HexTo, $ColorSteps) {
  $FromRGB['r'] = hexdec(substr($HexFrom, 0, 2));
  $FromRGB['g'] = hexdec(substr($HexFrom, 2, 2));
  $FromRGB['b'] = hexdec(substr($HexFrom, 4, 2));

  $ToRGB['r'] = hexdec(substr($HexTo, 0, 2));
  $ToRGB['g'] = hexdec(substr($HexTo, 2, 2));
  $ToRGB['b'] = hexdec(substr($HexTo, 4, 2));

  $StepRGB['r'] = ($FromRGB['r'] - $ToRGB['r']) / ($ColorSteps - 1);
  $StepRGB['g'] = ($FromRGB['g'] - $ToRGB['g']) / ($ColorSteps - 1);
  $StepRGB['b'] = ($FromRGB['b'] - $ToRGB['b']) / ($ColorSteps - 1);

  $GradientColors = array();

  for($i = 0; $i <= $ColorSteps; $i++) {
    $RGB['r'] = floor($FromRGB['r'] - ($StepRGB['r'] * $i));
    $RGB['g'] = floor($FromRGB['g'] - ($StepRGB['g'] * $i));
    $RGB['b'] = floor($FromRGB['b'] - ($StepRGB['b'] * $i));

    $HexRGB['r'] = sprintf('%02x', ($RGB['r']));
    $HexRGB['g'] = sprintf('%02x', ($RGB['g']));
    $HexRGB['b'] = sprintf('%02x', ($RGB['b']));

    $GradientColors[] = implode(NULL, $HexRGB);
  }
  $GradientColors = array_filter($GradientColors, "len");
  return $GradientColors;
}

function len($val){
  return (strlen($val) == 6 ? true : false );
}








/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/admin/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'WP Retina 2x', // The plugin name.
            'slug'               => 'wp-retina-2x', // The plugin slug (typically the folder name).

            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.

        ),

        // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => dirname( __FILE__ ) . '/lib/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'               => 'Nova Shortcodes', // The plugin name.
            'slug'               => 'nova_shortcodes', // The plugin slug (typically the folder name).
            'source'             => dirname( __FILE__ ) . '/lib/nova_shortcodes.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'               => 'WooCommerce', // The plugin name.
            'slug'               => 'woocommerce', // The plugin slug (typically the folder name).
            'source'             => dirname( __FILE__ ) . '/lib/woocommerce.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

