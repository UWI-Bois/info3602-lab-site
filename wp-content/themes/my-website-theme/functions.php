<?php
// this is backend stuff that will be called by wordpress
    function university_files(){
        // nickname for stylesheet
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
        wp_enqueue_style('custom-google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts.js'), NULL, '1.0', true);
        wp_enqueue_script('bundle-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    } // files

    function university_features(){
        add_theme_support('title-tag'); // support title pages with the title tag
        register_nav_menu('headerMenuLocation', 'Header Menu Location');

        add_theme_support('post-thumbnails'); // support feature images
	    add_image_size('professorLandscape', 400, 260, true);
	    add_image_size('professorPortrait', 480, 650, true);
	    add_image_size('pageBanner', 1500, 350, true);
    }

    function university_adjust_queries($query){
        if(
            !is_admin() AND
            is_post_type_archive('event') AND
            $query->is_main_query()
        ){
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                'key'=> 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            ));
            wp_reset_postdata();
        }

        if(
            !is_admin() AND
            is_post_type_archive('program') AND
            $query->is_main_query()
        ){
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', '-1');
			wp_reset_postdata();
        }

        if(
            !is_admin() AND
            is_post_type_archive('professor') AND
            $query->is_main_query()
        ){
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', '-1');
			wp_reset_postdata();
        }
    }
    add_action('pre_get_posts', 'university_adjust_queries'); // this query affects everything globally, very powerful!, even affects the admin dash

    // type of instruction for wordpress to run, function name to run
    add_action('wp_enqueue_scripts', 'university_files');
    add_action('after_setup_theme', 'university_features');

    function pageBanner($args){
//    	$title = "epic banner title that needs to be replaced";
//    	$sub = "epic banner subtitle that needs to be replaced";
//	    try {
//		    global $title, $sub;
//		    $title = $args['title'];
//		    $sub = $args['subtitle'];
//	    }
//	    catch (Exception $e){
//	    	echo 'caught exception: ', $e->getMessage();
//	    }

	    if (!$args['title']){
	    	$args['title'] = get_the_title();
	    }
	    if (!$args['subtitle']){
	    	$args['subtitle'] = get_field('page_banner_subtitle');
	    }
	    if(!$args['photo']){ // if no image is supplied
			if(get_field('page_banner_bg')) $args['photo'] = get_field('page_banner_bg')['sizes']['pageBanner'];
			else $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
	    }
    	?>
    	<div class="page-banner">
	        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
	        <div class="page-banner__content container container--narrow">
	            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
				<div class="page-banner__intro">
					<p><?php echo $args['subtitle']; ?></p>
				</div>
			</div>
		</div>
    <?php
    }

    function isSubscriber(){
	    $currUser = wp_get_current_user();
	    $numRoles = count($currUser->roles);
	    $userRole = $currUser->roles[0];
	    if($numRoles == 1 AND $userRole == 'subscriber') return true;
	    return false;
    }

    function redirectSubsToFrontend(){
        if(isSubscriber()){
            wp_redirect(site_url('/'));
            exit; // tell php to stop once someone is redirected
        }
    }
    add_action('admin_init', 'redirectSubsToFrontend');


    function noSubsAdminBar(){
	    if(isSubscriber()) show_admin_bar(false);
    }
    add_action('wp_loaded', 'noSubsAdminBar');

    /*
     * customize login screen:
     * arg 1 - object to customize (the hook, in this case, clicking wordpress logo on login screen)
     * arg 2 - function to achieve this
     */

        function ourHeaderUrl(){
            return esc_url(site_url('/'));
        }
        add_filter('login_headerurl', 'ourHeaderUrl');

    // load custom CSS on login screen
        function ourLoginCSS(){
            wp_enqueue_style('university_main_styles', get_stylesheet_uri());
            wp_enqueue_style(
	            'custom-google-font',
                'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i'
            );
        }
        add_action('login_enqueue_scripts', 'ourLoginCSS');
