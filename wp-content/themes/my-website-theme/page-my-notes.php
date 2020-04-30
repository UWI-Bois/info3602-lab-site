<?php // exercise 1 lecture 3
if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url('/')));
    exit; // save resources
}
get_header();
while (have_posts()) { // iterate through all posts
    the_post(); // curr post
    pageBanner($args=null);
?>


    <div class="container container--narrow page-section">


    </div>

<?php
} // end while
get_footer();
?>