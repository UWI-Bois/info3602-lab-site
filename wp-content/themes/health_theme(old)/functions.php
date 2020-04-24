<?php
// this is backend stuff that will be called by wordpress
    function hsu_files(){
        // nickname for stylesheet
        wp_enqueue_style('hsu_main_styles', get_stylesheet_uri());
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        wp_enqueue_script('jquery_js', get_theme_file_uri('/js/jquery.js'), NULL, '1.0', true);
        wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.min.js'), NULL, '1.0', true);
        wp_enqueue_script('sticky_js', get_theme_file_uri('/js/jquery.sticky.js'), NULL, '1.0', true);
        wp_enqueue_script('stellar_js', get_theme_file_uri('/js/jquery.stellar.min.js'), NULL, '1.0', true);
        wp_enqueue_script('owl_js', get_theme_file_uri('/js/owl.carousel.min.js'), NULL, '1.0', true);
        wp_enqueue_script('smoothscroll_js', get_theme_file_uri('/js/smoothscroll.js'), NULL, '1.0', true);

        wp_enqueue_script('wow_js', get_theme_file_uri('/js/wow.min.js'), NULL, '1.0', true);
        wp_enqueue_script('custom_js', get_theme_file_uri('/js/custom.js'), NULL, '1.0', true);

    } // files

    function university_features(){
        add_theme_support('title-tag');
        register_nav_menu('headerMenuLocation', 'Header Menu Location');
    }

    // type of instruction for wordpress to run, function name to run
    add_action('wp_enqueue_scripts', 'hsu_files');
//    add_action('after_setup_theme', 'university_features');

