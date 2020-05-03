<?php
/*
 * any file within the mu-plugins folder will be included at runtime, and wp will NEED it to run
 */
function jj_post_types(){
	/*
	 * my custom post types for testing myself
	 * i will be jj
	 * i will associate myself with food
	 */

	// me
	register_post_type('jj',array(
		'capability_type' => 'jj', // breaks it
		'supports' => array(
			'title', 'editor', 'excerpt', 'custom-fields'
		),
		'map_meta_cap' => true,
		'show_in_rest' => true,
		'show_ui' => true,
		'rewrite'=> array('slug' => 'jjs'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => "JJs",
			'add_new_item' => 'Add New JJ',
			'edit_item' => 'Edit JJ',
			'all_items' => 'All JJs',
			'singular_name' => "JJ"
		),
		'menu_icon' => 'dashicons-smiley'
	));
	// food
	register_post_type('food',array(
		'supports' => array(
			'title', 'editor', 'excerpt', 'custom-fields'
		),
		'capability_type' => 'food', // members plugin for roles and perms
		'map_meta_cap' => true,
		'show_in_rest' => true,
		'rewrite'=> array('slug' => 'foods'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => "Foods",
			'add_new_item' => 'Add New Food',
			'edit_item' => 'Edit Food',
			'all_items' => 'All Foods',
			'singular_name' => "Food"
		),
		'menu_icon' => 'dashicons-carrot'
	));

}

// hook new posts function
add_action('init', 'jj_post_types');