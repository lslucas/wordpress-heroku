<?php
/*
Plugin Name: Nova Shortcodes
Plugin URI: http://www.designova.net
Description: Plugin to be used with the premium WordPress theme Elegance
Author: designova
Author URI: http://www.designova.net
Version: 1.1
*/

/*
This example/starter plugin can be used to speed up Visual Composer plugins creation process.
More information can be found here: http://kb.wpbakery.com/index.php?title=Category:Visual_Composer
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');



class VCExtendAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'elegance_statistic', array( $this, 'render_elegance_statistic' ) );
        
        add_shortcode( 'elegance_section', array( $this, 'render_elegance_section' ) );
        
        add_shortcode( 'elegance_feature', array( $this, 'render_elegance_feature' ) );
        
        add_shortcode( 'elegance_text_block', array( $this, 'render_elegance_text_block' ) );
        
        add_shortcode( 'elegance_button', array( $this, 'render_elegance_button' ) );
        
        add_shortcode( 'elegance_services', array( $this, 'render_elegance_services' ) );
        
        add_shortcode( 'elegance_page_heading', array( $this, 'render_elegance_page_heading' ) );
        
        add_shortcode( 'elegance_testimonial', array( $this, 'render_elegance_testimonial' ) );

        add_shortcode( 'elegance_team', array( $this, 'render_elegance_team' ) );

        add_shortcode( 'elegance_carousel_wrap', array( $this, 'render_elegance_carousel_wrap' ) );

        add_shortcode( 'elegance_carousel_item', array( $this, 'render_elegance_carousel_item' ) );

        add_shortcode( 'elegance_image_slider', array( $this, 'render_elegance_image_slider' ) );

        add_shortcode( 'elegance_lightbox_image_gallery', array( $this, 'render_elegance_lightbox_image_gallery' ) );

        add_shortcode( 'elegance_portfolio', array( $this, 'render_elegance_portfolio' ) );

        add_shortcode( 'elegance_portfolio_item', array( $this, 'render_elegance_portfolio_item' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
    }
 
    public function integrateWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        
        
 
        /*
        Add your Visual Composer logic here.
        Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */
        

        
        vc_map( array(
            "name" => __("Elegance Section", 'vc_extend'),
            "description" => __("For any page section", 'vc_extend'),
            "base" => "elegance_section",
            "class" => "",
            "controls" => "full",
            "content_element" => true,
            'is_container' => true,
            "show_settings_on_create" => true,
            "icon" => plugins_url('assets/icons/row.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Background Color', 'js_composer' ),
                  'param_name' => 'bg_color',
                  'description' => __( 'Select Background color', 'js_composer' )
              ),
              array(
                  'type' => 'attach_image',
                  'heading' => __( 'Background Image', 'js_composer' ),
                  'param_name' => 'bg_image',
                  'value' => '',
                  'description' => __( 'Select image from media library.', 'js_composer' )
              ),
              array(
                  'type' => 'checkbox',
                  'heading' => __( 'Enable Backgound Parallax', 'js_composer' ),
                  'param_name' => 'bg_parallax',
                  'description' => __( 'If selected, backgound parallax will be enabled.', 'js_composer' ),
                  'value' => array( __( 'Yes, enable', 'js_composer' ) => 'yes' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Layout', 'vc_extend' ),
                    'param_name' => 'layout',
                    'value' => array(
                                      __( 'Normal', 'vc_extend' ) => 'normal',
                                      __( 'Split', 'vc_extend' ) => 'split'
                      ),
                    'description' => __( 'Select the section layout', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            ),
            "js_view" => 'VcColumnView'
        ) );

        
        vc_map( array(
            "name" => __("Elegance Statistic", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_statistic",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/statistic.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title", 'vc_extend'),
                  "param_name" => "title",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the Statistic Title", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Count", 'vc_extend'),
                  "param_name" => "count",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the Statistic Count", 'vc_extend')
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Color Theme', 'vc_extend' ),
                    'param_name' => 'color_theme',
                    'value' => array(
                                      __( 'Dark', 'vc_extend' ) => 'dark',
                                      __( 'Highlight Color', 'vc_extend' ) => 'highlight',
                                      __('White', 'vc_extend') => 'white'
                      ),
                    'description' => __( 'Select the color theme', 'vc_extend' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (medium and large devices)', 'vc_extend' ),
                    'param_name' => 'col_md_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-md-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-md-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-md-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-md-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-md-5',
                                      __( '6 columns', 'vc_extend') => 'col-md-6',
                                      __( '7 columns', 'vc_extend') => 'col-md-7',
                                      __( '8 columns', 'vc_extend') => 'col-md-8',
                                      __( '9 columns', 'vc_extend') => 'col-md-9',
                                      __( '10 columns', 'vc_extend') => 'col-md-10',
                                      __( '11 columns', 'vc_extend') => 'col-md-11',
                                      __( '12 columns', 'vc_extend') => 'col-md-12'
                      ),
                    'description' => __( 'Select the column span for medium and large devices', 'vc_extend' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (small devices)', 'vc_extend' ),
                    'param_name' => 'col_sm_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-xs-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-xs-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-xs-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-xs-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-xs-5',
                                      __( '6 columns', 'vc_extend') => 'col-xs-6',
                                      __( '7 columns', 'vc_extend') => 'col-xs-7',
                                      __( '8 columns', 'vc_extend') => 'col-xs-8',
                                      __( '9 columns', 'vc_extend') => 'col-xs-9',
                                      __( '10 columns', 'vc_extend') => 'col-xs-10',
                                      __( '11 columns', 'vc_extend') => 'col-xs-11',
                                      __( '12 columns', 'vc_extend') => 'col-xs-12'
                      ),
                    'description' => __( 'Select the column span for small devices', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );



        vc_map( array(
            "name" => __("Elegance Feature", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_feature",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/features.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title", 'vc_extend'),
                  "param_name" => "title",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the Feature Title", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Sub-title", 'vc_extend'),
                  "param_name" => "sub_title",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the feature sub-title", 'vc_extend')
              ),
              array(
                  'type' => 'attach_image',
                  'heading' => __( 'Background Image', 'js_composer' ),
                  'param_name' => 'bg_image',
                  'value' => '',
                  'description' => __( 'Select image from media library.', 'js_composer' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Color Theme', 'vc_extend' ),
                    'param_name' => 'color_theme',
                    'value' => array(
                                      __( 'Highlight Color', 'vc_extend' ) => 'highlight',
                                      __( 'Dark', 'vc_extend' ) => 'dark',
                                      __( 'White', 'vc_extend') => 'white'
                      ),
                    'description' => __( 'Select the color theme', 'vc_extend' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (medium and large devices)', 'vc_extend' ),
                    'param_name' => 'col_md_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-md-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-md-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-md-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-md-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-md-5',
                                      __( '6 columns', 'vc_extend') => 'col-md-6',
                                      __( '7 columns', 'vc_extend') => 'col-md-7',
                                      __( '8 columns', 'vc_extend') => 'col-md-8',
                                      __( '9 columns', 'vc_extend') => 'col-md-9',
                                      __( '10 columns', 'vc_extend') => 'col-md-10',
                                      __( '11 columns', 'vc_extend') => 'col-md-11',
                                      __( '12 columns', 'vc_extend') => 'col-md-12'
                      ),
                    'description' => __( 'Select the column span for medium and large devices', 'vc_extend' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (small devices)', 'vc_extend' ),
                    'param_name' => 'col_sm_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-xs-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-xs-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-xs-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-xs-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-xs-5',
                                      __( '6 columns', 'vc_extend') => 'col-xs-6',
                                      __( '7 columns', 'vc_extend') => 'col-xs-7',
                                      __( '8 columns', 'vc_extend') => 'col-xs-8',
                                      __( '9 columns', 'vc_extend') => 'col-xs-9',
                                      __( '10 columns', 'vc_extend') => 'col-xs-10',
                                      __( '11 columns', 'vc_extend') => 'col-xs-11',
                                      __( '12 columns', 'vc_extend') => 'col-xs-12'
                      ),
                    'description' => __( 'Select the column span for small devices', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );
        

        $elegance_options = get_option('elegance_wp');
        
        vc_map( array(
            "name" => __("Elegance Text Block", 'vc_extend'),
            "description" => __("For any block of text", 'vc_extend'),
            "base" => "elegance_text_block",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/text_block.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Content", 'vc_extend'),
                  "param_name" => "text_content",
                  "value" => __("I am test text block. Click edit button to change this text.", 'vc_extend'),
                  "description" => __("Enter your content.", 'vc_extend')
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Font Color', 'js_composer' ),
                  'param_name' => 'font_color',
                  'description' => __( 'Select Font color', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Font Size", 'vc_extend'),
                  "param_name" => "font_size",
                  "value" => __("14px", 'vc_extend'),
                  "description" => __("Specify the font size.", 'vc_extend')
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Font', 'vc_extend' ),
                  'param_name' => 'font_family',
                  'value' => array(
                                    __( $elegance_options['font_1'] ) => 'font1',
                                    __( $elegance_options['font_2'] ) => 'font2',
                                    __( $elegance_options['font_3'] ) => 'font3',
                                    __( $elegance_options['font_4'] ) => 'font4',
                                    __( $elegance_options['font_5'] ) => 'font5'
                    ),
                  'description' => __( 'Select the Font', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Font Weight", 'vc_extend'),
                  "param_name" => "font_weight",
                  "value" => __("300", 'vc_extend'),
                  "description" => __("Specify the font weight.", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Letter Spacing", 'vc_extend'),
                  "param_name" => "letter_spacing",
                  "value" => __("0px", 'vc_extend'),
                  "description" => __("Specify the letter spacing.", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Line Height", 'vc_extend'),
                  "param_name" => "line_height",
                  "value" => __("21px", 'vc_extend'),
                  "description" => __("Specify the line height (7 more than the font size).", 'vc_extend')
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Case', 'vc_extend' ),
                  'param_name' => 'font_case',
                  'value' => array(
                                    __( 'Normal' ) => '',
                                    __( 'Uppercase' ) => 'uppercase',
                                    __( 'Lowercase' ) => 'lowercase'
                    ),
                  'description' => __( 'Select the font case.', 'vc_extend' )
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Font Style', 'vc_extend' ),
                  'param_name' => 'font_style',
                  'value' => array(
                                    __( 'Normal' ) => 'normal',
                                    __( 'Italic' ) => 'italic'
                    ),
                  'description' => __( 'Select the font style.', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );
        


        vc_map( array(
            "name" => __("Elegance Button", 'vc_extend'),
            "description" => __("For any link", 'vc_extend'),
            "base" => "elegance_button",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/button.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Button Text", 'vc_extend'),
                  "param_name" => "btn_text",
                  "value" => __("click here", 'vc_extend'),
                  "description" => __("Enter your text.", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Button Link", 'vc_extend'),
                  "param_name" => "btn_link",
                  "value" => __("http://", 'vc_extend'),
                  "description" => __("Enter your link.", 'vc_extend')
              ),
              array(
                  'type' => 'checkbox',
                  'heading' => __( '', 'js_composer' ),
                  'param_name' => 'btn_new_tab',
                  'description' => __( '', 'js_composer' ),
                  'value' => array( __( 'Open link in a new window/tab', 'js_composer' ) => 'yes' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Font Color', 'js_composer' ),
                  'param_name' => 'font_color',
                  'description' => __( 'Select Font color', 'js_composer' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Background Color', 'js_composer' ),
                  'param_name' => 'btn_bg_color',
                  'description' => __( 'Select background color', 'js_composer' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Font Color on Mouse-over', 'js_composer' ),
                  'param_name' => 'hover_font_color',
                  'description' => __( 'Select Font color', 'js_composer' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Background  on Mouse-over', 'js_composer' ),
                  'param_name' => 'hover_btn_bg_color',
                  'description' => __( 'Select background color', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Font Size", 'vc_extend'),
                  "param_name" => "font_size",
                  "value" => __("14px", 'vc_extend'),
                  "description" => __("Specify the font size.", 'vc_extend')
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Font', 'vc_extend' ),
                  'param_name' => 'font_family',
                  'value' => array(
                                    __( $elegance_options['font_1'] ) => 'font1',
                                    __( $elegance_options['font_2'] ) => 'font2',
                                    __( $elegance_options['font_3'] ) => 'font3',
                                    __( $elegance_options['font_4'] ) => 'font4',
                                    __( $elegance_options['font_5'] ) => 'font5'
                    ),
                  'description' => __( 'Select the Font', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Font Weight", 'vc_extend'),
                  "param_name" => "font_weight",
                  "value" => __("300", 'vc_extend'),
                  "description" => __("Specify the font weight.", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Letter Spacing", 'vc_extend'),
                  "param_name" => "letter_spacing",
                  "value" => __("0px", 'vc_extend'),
                  "description" => __("Specify the letter spacing.", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Line Height", 'vc_extend'),
                  "param_name" => "line_height",
                  "value" => __("21px", 'vc_extend'),
                  "description" => __("Specify the line height (7 more than the font size).", 'vc_extend')
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Font Style', 'vc_extend' ),
                  'param_name' => 'font_style',
                  'value' => array(
                                    __( 'Normal' ) => 'normal',
                                    __( 'Italic' ) => 'italic'
                    ),
                  'description' => __( 'Select the font case.', 'vc_extend' )
              ),
              array(
                  'type' => 'checkbox',
                  'heading' => __( '', 'js_composer' ),
                  'param_name' => 'btn_border',
                  'description' => __( '', 'js_composer' ),
                  'value' => array( __( 'Enable border', 'js_composer' ) => 'yes' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Border Color', 'js_composer' ),
                  'param_name' => 'btn_border_color',
                  'description' => __( 'Select Border color', 'js_composer' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Border Color on Mouse-over', 'js_composer' ),
                  'param_name' => 'hover_btn_border_color',
                  'description' => __( 'Select Border color', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );



        vc_map( array(
            "name" => __("Elegance Services", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_services",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/services.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title", 'vc_extend'),
                  "param_name" => "title",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the Service Title", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Sub-title", 'vc_extend'),
                  "param_name" => "sub_title",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the service sub-title", 'vc_extend')
              ),
              array(
                  'type' => 'attach_image',
                  'heading' => __( 'Icon Image', 'js_composer' ),
                  'param_name' => 'icon_image',
                  'value' => '',
                  'description' => __( 'Select image from media library.', 'js_composer' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Alignment', 'vc_extend' ),
                    'param_name' => 'align',
                    'value' => array(
                                      __( 'Right', 'vc_extend' ) => 'right',
                                      __( 'Left', 'vc_extend' ) => 'left'
                      ),
                    'description' => __( 'Select the alignment', 'vc_extend' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );

        

        vc_map( array(
            "name" => __("Elegance Page Heading", 'vc_extend'),
            "description" => __("For Main Heading", 'vc_extend'),
            "base" => "elegance_page_heading",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/page_heading.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Heading", 'vc_extend'),
                  "param_name" => "heading",
                  "value" => __("Title", 'vc_extend'),
                  "description" => __("Specify the heading.", 'vc_extend')
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Font Color', 'js_composer' ),
                  'param_name' => 'font_color',
                  'description' => __( 'Select Font color', 'js_composer' )
              ),
              array(
                  'type' => 'dropdown',
                  'heading' => __( 'Font', 'vc_extend' ),
                  'param_name' => 'font_family',
                  'value' => array(
                                    __( $elegance_options['font_1'] ) => 'font1',
                                    __( $elegance_options['font_2'] ) => 'font2',
                                    __( $elegance_options['font_3'] ) => 'font3',
                                    __( $elegance_options['font_4'] ) => 'font4',
                                    __( $elegance_options['font_5'] ) => 'font5'
                    ),
                  'description' => __( 'Select the Font', 'vc_extend' )
              ),
              array(
                  'type' => 'colorpicker',
                  'heading' => __( 'Border Color', 'js_composer' ),
                  'param_name' => 'border_color',
                  'description' => __( 'Select Border color', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Extra class name", 'vc_extend'),
                  "param_name" => "customclass",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Add multiple classes seperated by a << SPACE >>", 'vc_extend')
              )
            )
        ) );



        vc_map( array(
            "name" => __("Elegance Testimonial", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_testimonial",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/testimonial.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Client Name", 'vc_extend'),
                  "param_name" => "name",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the name of the client or company", 'vc_extend')
              ),
              array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Testimonial Content", 'vc_extend'),
                  "param_name" => "testimonial_content",
                  "value" => __("I am test text block. Click edit button to change this text.", 'vc_extend'),
                  "description" => __("Enter your testimonial content.", 'vc_extend')
              ),
              array(
                  'type' => 'attach_image',
                  'heading' => __( 'Client Logo or Image', 'js_composer' ),
                  'param_name' => 'logo',
                  'value' => '',
                  'description' => __( 'Select image from media library.', 'js_composer' )
              )
            )
        ) );


        vc_map( array(
            "name" => __("Elegance Team", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_team",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/team.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Name", 'vc_extend'),
                  "param_name" => "name",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the name of the team member", 'vc_extend')
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Designation", 'vc_extend'),
                  "param_name" => "designation",
                  "value" => __("", 'vc_extend'),
                  "description" => __("Specify the designation of the team member", 'vc_extend')
              ),
              array(
                  'type' => 'attach_image',
                  'heading' => __( 'Team Member Image', 'js_composer' ),
                  'param_name' => 'member_image',
                  'value' => '',
                  'description' => __( 'Select image from media library.', 'js_composer' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (medium and large devices)', 'vc_extend' ),
                    'param_name' => 'col_md_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-md-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-md-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-md-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-md-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-md-5',
                                      __( '6 columns', 'vc_extend') => 'col-md-6',
                                      __( '7 columns', 'vc_extend') => 'col-md-7',
                                      __( '8 columns', 'vc_extend') => 'col-md-8',
                                      __( '9 columns', 'vc_extend') => 'col-md-9',
                                      __( '10 columns', 'vc_extend') => 'col-md-10',
                                      __( '11 columns', 'vc_extend') => 'col-md-11',
                                      __( '12 columns', 'vc_extend') => 'col-md-12'
                      ),
                    'description' => __( 'Select the column width for medium and large devices', 'vc_extend' )
              ),
              array(
                    'type' => 'dropdown',
                    'heading' => __( 'Column Width (small devices)', 'vc_extend' ),
                    'param_name' => 'col_sm_span',
                    'value' => array(
                                      __( '1 column', 'vc_extend' ) => 'col-xs-1',
                                      __( '2 columns', 'vc_extend' ) => 'col-xs-2',
                                      __( '3 columns', 'vc_extend' ) => 'col-xs-3',
                                      __( '4 columns', 'vc_extend' ) => 'col-xs-4',
                                      __( '5 columns', 'vc_extend' ) => 'col-xs-5',
                                      __( '6 columns', 'vc_extend') => 'col-xs-6',
                                      __( '7 columns', 'vc_extend') => 'col-xs-7',
                                      __( '8 columns', 'vc_extend') => 'col-xs-8',
                                      __( '9 columns', 'vc_extend') => 'col-xs-9',
                                      __( '10 columns', 'vc_extend') => 'col-xs-10',
                                      __( '11 columns', 'vc_extend') => 'col-xs-11',
                                      __( '12 columns', 'vc_extend') => 'col-xs-12'
                      ),
                    'description' => __( 'Select the column width for small devices', 'vc_extend' )
              ),
            )
        ) );



        vc_map( array(
            "name" => __("Elegance Carousel Wrap", "js_composer"),
            "base" => "elegance_carousel_wrap",
            "as_parent" => array('only' => 'elegance_carousel_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "icon" => plugins_url('assets/icons/carousel.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            "params" => array(
                // add params same as with any other content element
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "js_composer"),
                    "param_name" => "customclass",
                    "description" => __("Add multiple classes seperated by a << SPACE >>", "js_composer")
                )
            ),
            "js_view" => 'VcColumnView'
        ) );

        vc_map( array(
            "name" => __("Elegance Carousel Item", "js_composer"),
            "base" => "elegance_carousel_item",
            "content_element" => true,
            'is_container' => true,
            "show_settings_on_create" => false,
            "icon" => plugins_url('assets/icons/item.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            "params" => array(
                // add params same as with any other content element
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "js_composer"),
                    "param_name" => "customclass",
                    "description" => __("Add multiple classes seperated by a << SPACE >>", "js_composer")
                )
            ),
            "js_view" => 'VcColumnView'
        ) );


        vc_map( array(
            "name" => __("Elegance Image Slider", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_image_slider",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/image_slider.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  'type' => 'attach_images',
                  'heading' => __( 'Images', 'js_composer' ),
                  'param_name' => 'images',
                  'value' => '',
                  'description' => __( 'Select images from media library.', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "heading" => __("Extra class name", "js_composer"),
                  "param_name" => "customclass",
                  "description" => __("Add multiple classes seperated by a << SPACE >>", "js_composer")
              )
            )
        ) );

        vc_map( array(
            "name" => __("Elegance Lightbox Image Gallery", 'vc_extend'),
            "description" => __("", 'vc_extend'),
            "base" => "elegance_lightbox_image_gallery",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/icons/lightbox.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
              array(
                  "type" => "textfield",
                  "heading" => __("Gallery Name", "js_composer"),
                  "param_name" => "gallery_name",
                  "description" => __("Gallery Name should be unique.", "js_composer")
              ),
              array(
                  'type' => 'attach_images',
                  'heading' => __( 'Images', 'js_composer' ),
                  'param_name' => 'images',
                  'value' => '',
                  'description' => __( 'Select images from media library.', 'js_composer' )
              ),
              array(
                  "type" => "textfield",
                  "heading" => __("Extra class name", "js_composer"),
                  "param_name" => "customclass",
                  "description" => __("Add multiple classes seperated by a << SPACE >>", "js_composer")
              )
            )
        ) );

        
        vc_map( array(
            "name" => __("Elegance Portfolio", "js_composer"),
            "base" => "elegance_portfolio",
            "as_parent" => array('only' => 'elegance_portfolio_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => true,
            "icon" => plugins_url('assets/icons/portfolio.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            "params" => array(
                // add params same as with any other content element
                array(
                  "type" => "textfield",
                  "heading" => __("Portfolio Name", "js_composer"),
                  "param_name" => "name",
                  "description" => __("Portfolio name should be unique.", "js_composer")
              ),
                array(
                    "type" => "textfield",
                    "heading" => __("Filters", "js_composer"),
                    "param_name" => "filters",
                    "description" => __("Add multiple filters seperated by a << COMMA >>", "js_composer")
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => __( '', 'js_composer' ),
                    'param_name' => 'filter_display_status',
                    'description' => __( '', 'js_composer' ),
                    'value' => array( __( 'Show portfolio filter', 'js_composer' ) => 'yes' )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "js_composer"),
                    "param_name" => "customclass",
                    "description" => __("Add multiple classes seperated by a << SPACE >>", "js_composer")
                )
            ),
            "js_view" => 'VcColumnView'
        ) );

        vc_map( array(
            "name" => __("Elegance Portfolio Item", "js_composer"),
            "base" => "elegance_portfolio_item",
            "as_child" => array('only' => 'elegance_portfolio'),
            "icon" => plugins_url('assets/icons/portfolio_item.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Elegance Shortcodes', 'js_composer'),
            "params" => array(
                // add params same as with any other content element
                array(
                    "type" => "textfield",
                    "heading" => __("Title", "js_composer"),
                    "param_name" => "title",
                    "description" => __("", "js_composer")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Caption", "js_composer"),
                    "param_name" => "caption",
                    "description" => __("", "js_composer")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Thumbnail Image', 'js_composer' ),
                    'param_name' => 'thumb_image',
                    'value' => '',
                    'description' => __( 'Select image from media library.', 'js_composer' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Type', 'vc_extend' ),
                    'param_name' => 'type',
                    'value' => array(
                                      __( 'External Link', 'vc_extend' ) => 'ext_link',
                                      __( 'Lightbox Image', 'vc_extend' ) => 'lightbox_img',
                                      __( 'Lightbox Youtube Video', 'vc_extend' ) => 'lightbox_yt_vdo',
                                      __( 'Lightbox Vimeo Video', 'vc_extend' ) => 'lightbox_vimeo_vdo'
                      ),
                    'description' => __( 'Select the portfolio type', 'vc_extend' )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("External Link / URL", "js_composer"),
                    "param_name" => "ext_url",
                    "description" => __("", "js_composer")
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => __( '', 'js_composer' ),
                    'param_name' => 'ext_url_new_tab',
                    'description' => __( '', 'js_composer' ),
                    'value' => array( __( 'Open link in a new window/tab', 'js_composer' ) => 'yes' )
                ),
                array(
                    'type' => 'attach_images',
                    'heading' => __( 'Lightbox Images', 'js_composer' ),
                    'param_name' => 'images',
                    'value' => '',
                    'description' => __( 'Select images from media library.', 'js_composer' )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Video URL", "js_composer"),
                    "param_name" => "video_url",
                    "description" => __("", "js_composer")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Categories / Filters", "js_composer"),
                    "param_name" => "filter_cats",
                    "description" => __("Add multiple categories seperated by a << SPACE >>", "js_composer")
                )
            )
        ) );

        

        
    }

    
    
    
    /*
    Shortcode logic how it should be rendered
    */
    

    public function render_elegance_section( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'bg_color' => '',
        'bg_parallax' => '',
        'bg_image' => '',
        'layout' => '',
        'customclass' => ''
        
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
     //var_dump($content);
      $bg_img_url = '';
      if($bg_image != '')
      {
        $bg_image_url = wp_get_attachment_image_src( $bg_image , 'full');
        $bg_img_url = $bg_image_url[0];
      }
      
      if($bg_parallax == 'yes')
      {
        $customclass .= ' parallax-layer';
      }

      if($layout == 'normal')
      {
        $output = '<section class="'.$customclass.'" style="background: url('.$bg_img_url.') no-repeat;">'.do_shortcode($content).'</section>';
      }
      else
      {
        $output = '<section class="fullheightmin '.$customclass.'" style="background: url('.$bg_img_url.') no-repeat '. $bg_color.';"><div class="row"><div class="col-md-4 equal-height fullheightmin fullheight side-pad" style="background: '. $bg_color.';"><div class="valign">'.do_shortcode($content).'</div></div></div></section>';
      }
      return $output;
    }

    public function render_elegance_statistic( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'title' => '',
        'count' => '',
        'customclass' => '',
        'col_md_span' => '',
        'col_sm_span' => '',
        'color_theme' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      

      $output = '<article class="stats-item '.$col_md_span.' '.$col_sm_span.' '.$color_theme.'-stats '.$customclass.'">
                  <h3 class="font2 '.$color_theme.'">'.$count.'</h3>
                  <p class="font4 color">'.$title.'</p>
                </article>';
      return $output;
    }


    public function render_elegance_feature( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'title' => '',
        'sub_title' => '',
        'bg_image' => '',
        'customclass' => '',
        'col_md_span' => '',
        'col_sm_span' => '',
        'color_theme' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $bg_img_url = '';
      if($bg_image != '')
      {
        $bg_image_url = wp_get_attachment_image_src( $bg_image , 'full');
        $bg_img_url = $bg_image_url[0];
      }

      $output = '<article class="feature-block ease  '.$col_md_span.' '.$col_sm_span.' '.$color_theme.'-feature '.$customclass.'" style="background: url('.$bg_img_url.') no-repeat;">
                  <div class="">
                    <h3 class="font2 dark">'.$title.'</h3>
                    <h4 class="font4 '.$color_theme.'">'.$sub_title.'</h4>
                  </div>
                </article>';
      return $output;
    }



    public function render_elegance_text_block( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'font_color' => '',
        'font_size' => '',
        'font_family' => '',
        'font_weight' => '',
        'letter_spacing' => '',
        'line_height' => '',
        'font_case' => '',
        'font_style' => '',
        'customclass' => '',
        'text_content' => ''
      ), $atts ) );
      
      //$text_content = wpb_js_remove_wpautop($text_content, true); // fix unclosed/unwanted paragraph tags in $text_content
     //var_dump($content);
      
      $style = 'style="color: '.$font_color.'; font-style:'.$font_style.'; font-size: '.$font_size.'; font-weight: '.$font_weight.'; letter-spacing: '.$letter_spacing.'; line-height: '.$line_height.';"';

      $output = '<div class="elegance-txt-block"><span data-color="'.$font_color.'" class="'.$customclass.' '.$font_family.' '.$font_case.'" '.$style.' >'.$text_content.'</span></div>';
      return $output;
    }


    public function render_elegance_button( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'font_color' => '',
        'font_size' => '',
        'font_family' => '',
        'font_weight' => '',
        'letter_spacing' => '',
        'line_height' => '',
        'font_style' => '',
        'customclass' => '',
        'btn_text' => '',
        'btn_link' => '',
        'btn_new_tab' => '',
        'btn_bg_color' => '',
        'hover_font_color' => '',
        'hover_btn_bg_color' => '',
        'btn_border' => '',
        'btn_border_color' => '',
        'hover_btn_border_color' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
     //var_dump($content);
      
      $style = 'style="color: '.$font_color.'; font-style:'.$font_style.'; background:'.$btn_bg_color.'; font-size: '.$font_size.'; font-weight: '.$font_weight.'; letter-spacing: '.$letter_spacing.'; line-height: '.$line_height.';"';
      $new_tab_opt = '';

      if($btn_new_tab == 'yes')
      {
        $new_tab_opt = 'target="_blank"';
      }

      if($btn_border == 'yes')
      {
        $border_class = 'enable-btn-border';
        $border_style = 'style="border: 6px solid '.$btn_border_color.';" data-hover-border="'.$hover_btn_border_color.'"';
      }
      else
      {
        $border_class = '';
        $border_style = '';
      }

      $output = '<span class="button-elegance-wrap '.$border_class.'" '.$border_style.'><a href="'.$btn_link.'" '.$new_tab_opt.' data-hover-bg="'.$hover_btn_bg_color.'" data-hover-color="'.$hover_font_color.'" class="btn button-elegance '.$customclass.' '.$font_family.'" '.$style.' >'.$btn_text.'</a></span>';
      return $output;
    }


    public function render_elegance_services( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'title' => '',
        'sub_title' => '',
        'icon_image' => '',
        'customclass' => '',
        'align' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $icon_img_url = '';
      if($icon_image != '')
      {
        $icon_image_url = wp_get_attachment_image_src( $icon_image , 'full');
        $icon_img_url = $icon_image_url[0];
      }

      
      if($align == 'right')
      {
        $output = '<div class="row service-item services-spec service-'.$align.' '.$customclass.'">
                    <article class="col-md-9 col-sm-8 text-right">
                      <h3 class="font2 dark">'.$title.'</h3>
                      <h4 class="font4 color">'.$sub_title.'</h4>
                    </article>
                    <article class="col-md-3 col-sm-4 text-right">
                      <img class="img-responsive" src="'.$icon_img_url.'" alt="'.$title.'" title="'.$title.'"/>
                    </article>
                  </div>'; 
      }       
      else
      {
        $output = '<div class="row service-item services-spec service-'.$align.' '.$customclass.'">
                    <article class="col-md-3 col-sm-4 text-left">
                      <img class="img-responsive" src="'.$icon_img_url.'" alt="'.$title.'" title="'.$title.'"/>
                    </article>
                    <article class="col-md-9 col-sm-8 text-left">
                      <h3 class="font2 dark">'.$title.'</h3>
                      <h4 class="font4 color">'.$sub_title.'</h4>
                    </article>
                  </div>';
      }        
      return $output;
    }

    public function render_elegance_page_heading( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'font_color' => '',
        'font_family' => '',
        'heading' => '',
        'border_color' => '',
        'customclass' => ''
      ), $atts ) );
      
      //$heading = wpb_js_remove_wpautop($heading, true); // fix unclosed/unwanted paragraph tags in $text_content
     //var_dump($content);
      
      $style = 'style="color: '.$font_color.'; border-color:'.$border_color.';"';

      $output = '<div class="clear"></div><div class="page-head"><span class="page-heading '.$font_family.' '.$customclass.'" '.$style.'>'.$heading.'</span></div><div class="clear"></div>';
      return $output;
    }


    public function render_elegance_testimonial( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'name' => '',
        'testimonial_content' => '',
        'logo' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $logo_url = '';
      if($logo != '')
      {
        $logo_img_url = wp_get_attachment_image_src( $logo , 'full');
        $logo_url = $logo_img_url[0];
      }

      
      $output = '<div class="testimonial-carousel-item testimonial-wrap">
                  <img alt="'.$name.'" title="'.$name.'" src="'.$logo_url.'"/>
                  <h6 class="color font4">'.$testimonial_content.'</h6>
                  <p><span class="sub-heading silver font2">'.$name.'</span></p>
                </div>'; 
      return $output;
    }

    public function render_elegance_team( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'name' => '',
        'designation' => '',
        'member_image' => '',
        'col_md_span' => '',
        'col_sm_span' => ''
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $member_image_url = '';
      if($member_image != '')
      {
        $member_img_url = wp_get_attachment_image_src( $member_image , 'full');
        $member_image_url = $member_img_url[0];
      }

      
      $output = '<article class="'.$col_md_span.' '.$col_sm_span.' no-pad team-thumb-item">
                  <img class="img-responsive" src="'.$member_image_url.'" alt="'.$name.'" title="'.$name.'"/>
                  <div class="team-info text-center">
                    <div class="valign">
                      <h3 class="font2 black">'.$name.'</h3>
                      <h6 class="font4 color">'.$designation.'</h6>
                    </div>
                  </div>
                </article>'; 
      return $output;
    }
    

    public function render_elegance_carousel_wrap( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'customclass' => ''
        
        
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      

      $output = '<div class="elegance-carousel owl-carousel '.$customclass.'">'.do_shortcode($content).'</div>';
      return $output;
    }

    public function render_elegance_carousel_item( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'customclass' => ''
        
      ), $atts ) );
     
      // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      

      $output = '<div class="item '.$customclass.'">'.do_shortcode($content).'</div>';
      return $output;
    }

    public function render_elegance_image_slider( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'images' => '',
        'customclass' => ''
        
      ), $atts ) );
     
      // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $slide_list = '';
      if($images != '')
      {
        $image_list = explode(',', $images);
        foreach($image_list as $image_id)
        {
          $slide_img = wp_get_attachment_image_src( $image_id , 'full');
          $slide_image_url = $slide_img[0];
          $slide_list .= '<li><img alt="" title="" src="'.$slide_image_url.'" /></li>';
        }
        
      }

      $output = '<div class="'.$customclass.'">
                  <div class="row">
                    <div class="single-project-slider-wrap">
                      <ul class="single-project-slider bxslider">'.$slide_list.'</ul>
                    </div>
                  </div>
                </div>';
      return $output;
    }


    public function render_elegance_lightbox_image_gallery( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'gallery_name' => '',
        'images' => '',
        'customclass' => ''
        
      ), $atts ) );
     
      // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      $slide_list = '';
      if($images != '')
      {
        $image_list = explode(',', $images);
        foreach($image_list as $image_id)
        {
          $slide_img = wp_get_attachment_image_src( $image_id , 'full');
          $slide_image_url = $slide_img[0];

          $thumb_img = wp_get_attachment_image_src( $image_id , 'thumbnail');
          $thumb_image_url = $thumb_img[0];

          $slide_list .= '<article class="col-md-3 col-xs-6 single-project-block no-pad">
                            <div class="whitegray-bg">
                              <a  class="venobox zoom" data-gall="'.strtolower(str_replace(' ', '-', $gallery_name)).'-gallery" href="'.$slide_image_url.'">
                                <img alt="" title="" class="img-responsive" src="'.$slide_image_url.'" />
                                <div class="zoom-icon-wrap"></div>    
                              </a>
                            </div>
                          </article>';
        }
        
      }

      $output = '<div class="'.$customclass.'">
                  <div class="row">'.$slide_list.'</div>
                </div>';
      return $output;
    }

    public function render_elegance_portfolio( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'name' => '',
        'filters' => '',
        'filter_display_status' => '',
        'customclass' => ''
        
        
      ), $atts ) );
      
     // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      
      $filter_markup = '';
      $filter_list = '';
      if($filter_display_status == 'yes' && $filters != '')
      {            
        $filter_items = explode(',', $filters);

        $filter_list .= '<li><a href="#" data-filter="*" class="active"><span>'.__('Tudo','elegancelang').'</span></a></li>';
        foreach ($filter_items as $filter_item) 
        {
          $filter_list .= '<li><a href="#" data-filter=".'.strtolower(str_replace(' ', '-', remove_accents($filter_item))).'" ><span>'.$filter_item.'</span></a></li>';
        }

        $filter_markup = '<div class="row">
                            <article class="col-md-12 text-center works-filter-wrap">
                              <ul class="works-filter clearfix">'.$filter_list.'</ul>
                            </article>
                          </div>';
      }

      $output = '<div class="'.$customclass.'">
                  '.$filter_markup.'
                  <div class="row">
                    <div id="'.strtolower(str_replace(' ', '-', $name)).'" class="works-container clearfix">'.do_shortcode($content).'</div>
                  </div>
                </div>
      ';
      
      wp_enqueue_script( 'elegance-isotope' );
      wp_enqueue_script( 'elegance-isotope-init' );
      return $output;
    }

    public function render_elegance_portfolio_item( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'title' => '',
        'caption' => '',
        'thumb_image' => '',
        'type' => '',
        'ext_url' => '',
        'ext_url_new_tab' => '',
        'images' => '',
        'video_url' => '',
        'filter_cats' => ''
        
      ), $atts ) );
     
      // $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
      
      $thumb_image_url = '';
      if($thumb_image != '')
      {
        $thumb_img_url = wp_get_attachment_image_src( $thumb_image , 'full');
        $thumb_image_url = $thumb_img_url[0];
      }

      $a_tag_attrs = '';
      $lightbox_img_gallery = '';
      $cursor_class = '';

      //PORTFOLIO TYPE LIGHTBOX IMAGE
      if($type == 'lightbox_img')
      {
          $cursor_class = 'zoom';
          
          if($images == '')
          {
              $a_tag_attrs = 'class="venobox" href="'.$thumb_image_url.'"';
          }
          else
          {
              $image_list = explode(',', $images);

              $first_image = 0;
              foreach($image_list as $image_id)
              {
                $slide_img = wp_get_attachment_image_src( $image_id , 'full');
                $slide_image_url = $slide_img[0];

                
                if($first_image == 0)
                {
                  $a_tag_attrs = 'class="venobox" data-gall="portfolio-gallery-'.strtolower(str_replace(' ', '-', $title)).'" href="'.$slide_image_url.'"';
                  $first_image = 1;
                }
                else
                {
                  $lightbox_img_gallery .= '<a href="'.$slide_image_url.'" class="venobox hidden" data-gall="portfolio-gallery-'.strtolower(str_replace(' ', '-', $title)).'"></a>';
                }
                
              }
          }
      }

      //PORTFOLIO TYPE LIGHTBOX YOUTUBE VIDEO
      if($type == 'lightbox_yt_vdo')
      {
        $cursor_class = 'play';
        $a_tag_attrs = 'class="venobox" data-type="youtube" href="'.$video_url.'"';

      }

      //PORTFOLIO TYPE LIGHTBOX VIMEO VIDEO
      if($type == 'lightbox_vimeo_vdo')
      {
        $cursor_class = 'play';
        $a_tag_attrs = 'class="venobox" data-type="vimeo" href="'.$video_url.'"';

      }

      //PORTFOLIO TYPE EXTERNAL LINK
      if($type == 'ext_link')
      {
        $cursor_class = 'info';
        if($ext_url_new_tab == 'yes')
          $a_tag_attrs = 'href="'.$ext_url.'" target="_blank"';
        else
          $a_tag_attrs = 'href="'.$ext_url.'"';

      }
        
        if($caption){
        $caption_output = '<p class="white"><span class="black-bg">'.$caption.'</span></p>';
        }

      $output = '<div class="works-item works-item-one-third '.$cursor_class.' '.strtolower($filter_cats).'">
                  <img alt="'.strtolower(str_replace(' ', '-', $title)).'" title="'.strtolower(str_replace(' ', '-', $title)).'" class="img-responsive" src="'.$thumb_image_url.'"/>
                  <a '.$a_tag_attrs.' >
                      <div class="works-item-inner valign">
                        <h3 class="black">'.$title.'</h3>'.$caption_output.'
                      </div>
                  </a>
                  '.$lightbox_img_gallery.'
                </div>
      ';
      return $output;
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function loadCssAndJs() {
      wp_register_style( 'vc_extend_style', plugins_url('assets/vc_extend.css', __FILE__) );
      wp_enqueue_style( 'vc_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), $plugin_data['Name']).'</p>
        </div>';
    }



}
// Finally initialize code
new VCExtendAddonClass();


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Elegance_Section extends WPBakeryShortCodesContainer {
    }
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Elegance_Carousel_Wrap extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Elegance_Carousel_Item extends WPBakeryShortCodesContainer {
    }
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Elegance_Portfolio extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Elegance_Portfolio_Item extends WPBakeryShortCode {
    } 

}