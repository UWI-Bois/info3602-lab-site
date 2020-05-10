<?php
require get_theme_file_path('inc/search-route.php');
require get_theme_file_path('inc/exercise-week14.php');

// this is backend stuff that will be called by wordpress
    function university_files(){
	    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), array('jquery'), '1.0',true);

	    // todo what is this
	    wp_localize_script(
	            'main-university-js',
            'universityData',
            array('root_url' => get_site_url())
        );

        wp_enqueue_style('custom-google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
    } // files
    // type of instruction for wordpress to run, function name to run
    add_action('wp_enqueue_scripts', 'university_files');

    function university_features(){
        add_theme_support('title-tag'); // support title pages with the title tag
        register_nav_menu('headerMenuLocation', 'Header Menu Location');

        add_theme_support('post-thumbnails'); // support feature images
	    add_image_size('professorLandscape', 400, 260, true);
	    add_image_size('professorPortrait', 480, 650, true);
	    add_image_size('pageBanner', 1500, 350, true);
    }
    add_action('after_setup_theme', 'university_features');

    function jj_features(){
        /*
         * add featured images and other things for jj features
         */
        add_theme_support('title-tag');
        register_nav_menu('headerMenuLocation', 'Header Menu Location');

        add_theme_support('post-thumbnails'); // support feature images
        add_image_size('foodLandscape', 400, 260, true);
        add_image_size('foodPortrait', 480, 650, true);
    }
    add_action('after_setup_theme', 'jj_features');

    function university_adjust_queries($query){
        /*
         * this function runs queries on all the custom post types we have.
         * very powerful
         * if you make new custom post types, consider adjusting them here.
         */
        if(!is_admin() AND $query->is_main_query()){
            if(is_post_type_archive('event')){
	            $query->set('meta_key', 'event_date');
	            $query->set('orderby', 'meta_value_num');
	            $query->set('order', 'ASC');
	            $query->set('meta_query', array(
		            array(
			            'key' => 'event_date',
			            'compare' => '>=',
			            'value' => date('Ymd'),
			            'type' => 'numeric'
		            )
	            ));
	            wp_reset_postdata();
            }
            if(is_post_type_archive('program')){
	            $query->set('orderby', 'title');
	            $query->set('order', 'ASC');
	            $query->set('posts_per_page', '-1');
	            wp_reset_postdata();
            }
            if(is_post_type_archive('professor')){
	            $query->set('orderby', 'title');
	            $query->set('order', 'ASC');
	            $query->set('posts_per_page', '-1');
	            wp_reset_postdata();
            }
        }
    }
    // this query affects everything globally, very powerful!, even affects the admin dash
    add_action('pre_get_posts', 'university_adjust_queries');

    function jj_adjust_queries($query){
        // make sure we apply these rules to the frontend and NOT the admin dash
        if (!is_admin() AND $query->is_main_query()){

            // for jj posts
            if(is_post_type_archive('jj')){
	            $query->set('order', 'ASC');
	            wp_reset_postdata();
            }

            // for food posts
            if(is_post_type_archive('food')){
	            $query->set('order', 'DESC');
	            wp_reset_postdata();
            }


        }
    }
    add_action('pre_get_posts', 'jj_adjust_queries');




    function pageBanner($args){
        /*
         * dynamically supply the banner with data
         * or fill it with default data
         */
	    if (!$args['title']){
	    	$args['title'] = get_the_title();
	    }
	    if (!$args['subtitle']){
	    	$args['subtitle'] = get_field('page_banner_subtitle');
	    }
	    if(!$args['photo']){ // if no image is supplied
			if(get_field('page_banner_bg'))
			    $args['photo'] = get_field('page_banner_bg')['sizes']['pageBanner'];
			else $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
	    }
    	?>
    	<div class="page-banner">
	        <div class="page-banner__bg-image"
                 style="background-image: url(<?php echo $args['photo']; ?>);"></div>
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
        /*
         * utility function to determine if the current signed in user
         * is a subscriber or not.
         *
         * returns bool
         */
	    $currUser = wp_get_current_user();
	    $numRoles = count($currUser->roles);
	    $userRole = $currUser->roles[0];
	    if($numRoles == 1 AND $userRole == 'subscriber') return true;
	    return false;
    }

    function isAdmin(){
        /*
         * utility function to determine if the current signed in user
         * is a subscriber or not.
         *
         * returns bool
         */
	    $currUser = wp_get_current_user();
	    $numRoles = count($currUser->roles);
	    $userRole = $currUser->roles[0];
	    if($numRoles == 1 AND $userRole == 'administrator') return true;
	    return false;
    }

    function redirectSubsToFrontend(){
        /*
         * redirect subs to the homepage after signing in.
         * refer to the hook right under.
         */
        if(isSubscriber()){
            wp_redirect(site_url('/'));
            exit; // tell php to stop once someone is redirected
        }
    }
    add_action('admin_init', 'redirectSubsToFrontend');

    function redirectAdminsToFrontend(){
        /*
         * redirect subs to the homepage after signing in.
         * refer to the hook right under.
         */
        if(isAdmin()){
            wp_redirect(site_url('/'));
            exit; // tell php to stop once someone is redirected
        }
    }
    add_action('admin_init', 'redirectAdminsToFrontend');

    function noSubsAdminBar(){
        /*
         * hide the admin nav bar for subs
         * refer to the hook under
         */
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


// customizing the rest api call
function university_custom_rest(){
    // add custom fields to json api :)
    register_rest_field(
            'post', // post type
        'authorName', // json property name
        array(
                'get_callback' => function(){ // the php code we want to run
                    return get_the_author();
                }
        )
    );
}
add_action('rest_api_init', 'university_custom_rest');