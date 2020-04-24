<?php

// lab 6 -> custom post
function university_post_types(){
    register_post_type('event', array(
    	'capability_type' => 'event',
        'map_meta_cap' => true,
        'supports' => array(
            'title', 'editor', 'excerpt', 'custom-fields'
        ),
        'public' => true,
        'rewrite' => array(
            'slug' => 'events'
        ),
        'has_archive' => true,
        'labels' => array(
            'name' => "Events",
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singluar_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar',
    ));

	register_post_type('program',array(
		'capability_type' => 'program',
		'map_meta_cap' => true,
		'supports' => array('title', 'editor'),
		'rewrite'=> array('slug' => 'programs' ),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => "Programs",
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'all_items' => 'All Programs',
			'singular_name' => "Program"
		),
		'menu_icon' => 'dashicons-awards'
	));

	register_post_type('professor',array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite'=> array('slug' => 'professors'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => "Professors",
			'add_new_item' => 'Add New Professor',
			'edit_item' => 'Edit Professor',
			'all_items' => 'All Professors',
			'singular_name' => "Professor"
		),
		'menu_icon' => 'dashicons-welcome-learn-more'
	));
}

// hook new posts function
add_action('init', 'university_post_types');