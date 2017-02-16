<?php




function elegance_showcase_type()
{

		/*---Slider custom post ----*/
	register_post_type('elegance_showcase',
		array(
			'labels' => array(
				'name' => __( 'Showcase' ,'elegancelang'),
				'singular_name' => __( 'Showcase Item' ,'elegancelang'),
				'add_new' => __( 'Add New Showcase Item' ,'elegancelang'),
				'add_new_item' => __( 'Add New Showcase Item' ,'elegancelang'),
				'edit' => __( 'Edit Showcase Item','elegancelang' ),
				'edit_item' => __( 'Edit Showcase Item','elegancelang' ),
			),
			'description' => __( 'Showcase','elegancelang' ),
			'public' => true,
			'exclude_from_search' => true,
			'supports' => array( 'title','editor'),
			'rewrite' => array( 'slug' => 'elegance-showcase', 'with_front' => false ),
			'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 100,
            'menu_icon' => get_template_directory_uri() . '/admin/options/img/custom/glyphicons_086_display.png',
		)
	);
}

?>