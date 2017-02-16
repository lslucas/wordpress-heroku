<?php
/*--Add a meta box for pages--*/
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script('wp-color-picker');
}
function elegance_define_page_metabox($post) 
{ 
  global $post,$elegance_meta;
  //Existing Meta value
  $page_promo_text            = get_post_meta($post->ID,'page_promo_text',true);
  //$meta_one_page              = get_post_meta($post->ID,'one_page',true);
  $meta_page_bgcolor          = get_post_meta($post->ID,'page_bgcolor',true);
  $meta_parallax_bg           = get_post_meta($post->ID,'parallax_bg',true);

  // Use nonce for verification
  wp_nonce_field(plugin_basename( __FILE__ ), 'elegance_noncename' );

  

  if($meta_page_bgcolor == null)
  {
    $pageColor = '#FFFFFF';
  }
  else
  {
    $pageColor = $meta_page_bgcolor;
  }

  if($meta_parallax_bg == null)
  {
    $parallax_bg = '';
  }
  else
  {
    $parallax_bg = $meta_parallax_bg;
  }

  
  //SUBHEADING
  $html = '<div class="title_boost">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Promotional Text";
  $html .= '</div> ';
  $html .= '<textarea id="page_promo_text" name="page_promo_text" style="width:500px; height:200px;"/>'.$page_promo_text.'</textarea>'; 
  $html .= '</div><br><hr>';
  

  //PAGE BACKGROUD COLOR
  $html .= "<div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<h4 class='labelclass'>Select the background color</h4>";
  $html .= '<input type="text" id="page_color" name="page_color" value="'.$pageColor.'" class="my-color-field" data-default-color="'.$pageColor.'" />';
  $html .= '</div>';
  $html .= '</div><br>';

  $html .= '<hr>
            <div class="title_boost">
              <br>
              <div class="labelclass">Background Image</div>
              <input readonly="readonly" id="img_url" value="'.$parallax_bg.'" name="parallax_bg"  class="kp_input_box" type="hidden"/>
              <input title="Upload" onclick="register_upload_button_event(jQuery(this));" class="kp_button_upload button" value="Add Image" type="button">
              <span style="padding-left:10px;"></span>
              <input title="Remove" onclick="register_remove_button_event(jQuery(this));" class="kp_button_remove button" value="Remove Image" type="button">
              <img class="image_preview" style="max-width:300px; display:block; clear:both; margin-top:10px;" src="'.$parallax_bg.'" title="Image URL" alt=""/>
            </div><br><br>';

  echo'<input type="hidden" name="submit_chk" value="" />';
  echo '<small>';
       _e("",'realmlang' );
  echo '</small>'; 
  

  echo $html;  

}
/*Invoke the box*/
function elegance_create_page_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'page', 'Options', 'elegance_define_page_metabox', 'page', 'normal', 'high' );
	
  }
}

add_action('admin_init', 'menu_initialize_theme_options'); 

function menu_initialize_theme_options() {  
    add_settings_section(  
        'menu_settings_section',
        'menu Options',                  
        'menu_general_options_callback',
        'nav-menus.php'                            
    );  

    add_settings_field(  
        'test_field',                        
        'Test',                             
        'menu_test_field_callback',  
        'nav-menus.php',                            
        'menu_settings_section',         
        array(                             
            'Activate this setting to TEST.'  
        )  
    );

    register_setting(  
        'nav-menus.php',  
        'test_field'  
    );
}

function menu_test_field_callback($args) {  
    
}


/*-for saving the meta--*/
function elegance_save_metaboxdata($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
if(isset( $_POST['elegance_noncename'])) 
{
    if ( !wp_verify_nonce( $_POST['elegance_noncename'], plugin_basename( __FILE__ ) ) )
      return;
}
  // Check permissions
if(isset( $_POST['post_type'])) 
{
    if ( 'page' == $_POST['post_type'] ) 
    {
      if ( !current_user_can( 'edit_page', $post_id ) )
          return;
    }
    else
    {
      if ( !current_user_can( 'edit_post', $post_id ) )
          return;
    }

    
    
    
}
if(isset($_POST['submit_chk']))
  { 
    
    $page_promo_text = $_POST['page_promo_text'];
    //$onepage        = $_POST['include_onepage'];
    $pagebgcolor    = $_POST['page_color'];
    $parallax_bg    = $_POST['parallax_bg'];

    
    update_post_meta($post_id,'page_promo_text',$page_promo_text);
    //update_post_meta($post_id,'one_page',$onepage);
    update_post_meta($post_id,'page_bgcolor',$pagebgcolor);
    update_post_meta($post_id,'parallax_bg',$parallax_bg);
    

  } 

}

//Initialize
add_action('admin_menu', 'elegance_create_page_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'elegance_save_metaboxdata' ); /*--save metabox content*/








/*---------------------------------------------
-------------Showcase Metaboxes---------------
----------------------------------------------*/

function elegance_define_showcase_metabox($post) 
{ 
  global $post,$elegance_meta;

  //Existing Meta value
  $meta_showcase_title            = get_post_meta( $post->ID,'elegance_showcase_title',true);
  $meta_showcase_bg_image          = get_post_meta( $post->ID,'elegance_showcase_bg_image',true);
  $meta_showcase_caption           = get_post_meta( $post->ID,'elegance_showcase_caption',true);
  $meta_showcase_external_url      = get_post_meta( $post->ID,'elegance_showcase_link',true);
  $meta_showcase_link_txt          = get_post_meta( $post->ID,'elegance_showcase_link_txt',true);
  
  
  
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'elegance_showcase_noncename' );

  //Slide Title
  $html  = '<div class="title_boost">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Show title";
  $html .= '</div> ';
  if($meta_showcase_title == 1){
      $checked_sim = 'checked';
      $checked_nao = '';
  } elseif($meta_showcase_title == 0){
      $checked_sim = '';
      $checked_nao = 'checked';     
  }
  $html .= '<input type="radio" name="elegance_showcase_title" value="1" '.$checked_sim.'>Sim<br>';
  $html .= '<input type="radio" name="elegance_showcase_title" value="0" '.$checked_nao.'>Não<br>';
  $html .= '</div>';  
  //Slide Image
  $html  .=  '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Caption";
  $html .= '</div> ';
  $html .= '<input type="text" id="elegance_showcase_caption" name="elegance_showcase_caption" value="'.$meta_showcase_caption.'" size="45"/>'; 
  $html .= '</div>';
  //External URL
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "External URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="elegance_showcase_ext_url" name="elegance_showcase_ext_url" value="'.$meta_showcase_external_url.'" size="45"/>'; 
  $html .= '</div>';
  //External URL Text
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Link Text";
  $html .= '</div> ';
  $html .= '<input type="text" id="elegance_showcase_link_txt" name="elegance_showcase_link_txt" value="'.$meta_showcase_link_txt.'" size="45"/>'; 
  $html .= '</div>';
  //Background Image
  $html .= "<div class='title_boost'>";
  $html .= '<br><div class="labelclass">Background Image</div>';
  $html .= "<input value='".$meta_showcase_bg_image."' name='elegance_showcase_bg_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload button' value='Add' type='button'>";
  $html .= "&nbsp;<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove button' value='Remove' type='button'>";
  $html .= "<br><br><img class='image_preview' src='".$meta_showcase_bg_image."' title='Image URL' alt='' style='max-width:50%;'>";
  $html .= "</div>";
  
  $html .= '<br><br>';

 
  echo $html;

}
/*Invoke the box*/
function elegance_create_showcase_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {

    add_meta_box( 'sliders', 'Showcase Item Options', 'elegance_define_showcase_metabox', 'elegance_showcase', 'normal', 'high' );
    
  }
}
/*-for saving the meta--*/
function elegance_save_showcase_metabox($post_id)
{
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['elegance_showcase_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['elegance_showcase_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['elegance_showcase_bg_image']))
  if(isset($_POST['post_type']))
   {

      if ( 'elegance_showcase' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $title                = $_POST['elegance_showcase_title'];
      $image                = $_POST['elegance_showcase_bg_image'];
      $caption              = $_POST['elegance_showcase_caption'];
      $ext_link             = $_POST['elegance_showcase_ext_url'];
      $link_text            = $_POST['elegance_showcase_link_txt'];
      
      update_post_meta($post_id, 'elegance_showcase_title', $title);
      update_post_meta($post_id, 'elegance_showcase_bg_image', $image);
      update_post_meta($post_id, 'elegance_showcase_caption', $caption);
      update_post_meta($post_id, 'elegance_showcase_link', $ext_link);
      update_post_meta($post_id, 'elegance_showcase_link_txt', $link_text);
      
      
      
    }


        
}
//Initialize
add_action('admin_menu', 'elegance_create_showcase_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'elegance_save_showcase_metabox' ); /*--save metabox content*/





/*---------------------------------------------
-------------Post Metaboxes---------------
----------------------------------------------*/
function elegance_define_post_metabox($post) 
{ 
  global $post,$elegance_meta;

  //Existing Meta value
  //$meta_post_header_bg = get_post_meta( $post->ID,'post_header_bg',true);
  $meta_post_url = get_post_meta( $post->ID,'post_ext_url',true);
  $meta_post_embed_code = get_post_meta( $post->ID,'post_embed_code',true);
  $meta_post_quote = get_post_meta( $post->ID,'post_quote',true);
  $meta_post_slide_count = get_post_meta( $post->ID,'post_slide_count',true);
  $meta_post_slides = get_post_meta( $post->ID,'post_slides',true);

  //$meta_embed_code = str_replace("&rsquo;","'",$meta_embed_code);
  //$meta_embed_code = str_replace("&quot;",'"',$meta_embed_code);

  if($meta_post_slide_count == null)
    $meta_post_slide_count = 0;

  $post_slide_markup = '';

  if($meta_post_slide_count != 0)
  {
    $count = 0;
    $slide_counter = 1;
    foreach($meta_post_slides as $slides)
    {
      $post_slide_markup .= "<br>
                        <div class='title_boost'>
                          <br>
                          <div class='labelclass'>Slide <span class='slide_number'>".$slide_counter."</span></div>
                          <input readonly='readonly' id='img_url' value='".$slides."' name='elegance_slide_image".$slide_counter."'  class='kp_input_box' type='hidden'>
                          <input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload button' value='Add Image' type='button'>
                          <span style='padding-left:10px;'></span>
                          <input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove button' value='Remove Image' type='button'>
                          <img class='image_preview' style='max-width:300px; display:block; clear:both; margin-top:10px;' src='".$slides."' title='Image URL' alt=''/>
                        </div>";
      $count++;
      $slide_counter++;
    }
  }

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'elegance_post_noncename' );



//POST URL
  $html = '<div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Link / External URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="elegance_post_url" name="elegance_post_url" value="'.$meta_post_url.'" size="45"/>'; 
  $html .= '</div>';

//POST Embed Code
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Embed Code / iframe [For Video and Audio Posts]";
  $html .= '</div> ';
  $html .= '<input type="text" id="elegance_post_embed_code" name="elegance_post_embed_code" value="'.$meta_post_embed_code.'" size="45"/>'; 
  $html .= '</div>';
  $html .= '<small>Only iframes are allowed</small><br/>';

//POST Description
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Blockquote Content";
  $html .= '</div> ';
  $html .= '<textarea id="elegance_post_quote" name="elegance_post_quote" style="width:500px; height:200px;">'.$meta_post_quote.'</textarea>'; 
  $html .= '</div>';

  //Slide Images
  $html .= '<div class="slide_images">'.$post_slide_markup.'</div>';
  

  //ADD SLIDE BUTTON
    /*
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><a href="#" class="docopy-slides button">Add Image slide</a>'; 
  $html .= '</div><br>';

  $html .= '<input type="hidden" name="post_slide_count" id="slide_count" value="'.$meta_post_slide_count.'" />';
  */

  echo $html;

}
/*Invoke the box*/
function elegance_create_post_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
     add_meta_box( 'page', 'Options', 'elegance_define_post_metabox', 'post', 'normal', 'high' );
    
  }
}
/*-for saving the meta--*/
function elegance_save_post_metabox($post_id)
{
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['elegance_post_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['elegance_post_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['elegance_post_noncename']))
  if(isset($_POST['post_type']))
   {

      if ( 'post' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      //$up_post_header_bg = $_POST['header_bg'];
      $up_post_url = $_POST['elegance_post_url'];
      $up_post_embed_code = $_POST['elegance_post_embed_code'];
      $up_post_quote = $_POST['elegance_post_quote'];
      $up_post_slide_count = $_POST['post_slide_count'];

      $up_post_embed_code = str_replace("'","&rsquo;",$up_post_embed_code);
      $up_post_embed_code = str_replace('"',"&quot;",$up_post_embed_code);

      $up_post_slides = array();

      if($up_post_slide_count != 0)
      {
        for($k=1; $k<=$up_post_slide_count; $k++)
        {
          if($_POST['elegance_slide_image'.$k] != '')
          {
            array_push($up_post_slides,$_POST['elegance_slide_image'.$k]);
          }
        }
      }

      $up_post_slide_count = sizeof($up_post_slides);
      
      //update_post_meta($post_id, 'post_header_bg', $up_post_header_bg);
      update_post_meta($post_id, 'post_ext_url', $up_post_url);
      update_post_meta($post_id, 'post_embed_code', $up_post_embed_code);
      update_post_meta($post_id, 'post_quote', $up_post_quote);
      update_post_meta($post_id, 'post_slide_count', $up_post_slide_count);
      update_post_meta($post_id, 'post_slides', $up_post_slides);
    }

      
}
//Initialize
add_action('admin_menu', 'elegance_create_post_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'elegance_save_post_metabox' ); /*--save metabox content*/
?>