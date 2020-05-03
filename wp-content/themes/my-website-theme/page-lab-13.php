<?php // lab 13
if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url('/')));
    exit; // save resources
}
get_header();
while (have_posts()) { // grab my notes page from admin dash
    the_post();
    pageBanner($args=null);
?>


    <div class="container container--narrow page-section">
        <h1>Task 1</h1>

    </div>

<?php
} // end while
get_footer();
?>