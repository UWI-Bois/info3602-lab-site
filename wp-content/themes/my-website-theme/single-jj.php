<?php // exercise 1 lecture 3
if(!is_user_logged_in()){
	wp_redirect(esc_url(site_url('/')));
	exit; // save resources
}
get_header();
while(have_posts()){ // iterate through all posts
    the_post(); // curr post
	pageBanner(array());
    // jump out of php into html
//    ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('jj') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Event Home
                </a>
            </p>
        </div>
        <div class="generic-content">
            <? the_content(); ?>
        </div>
        <?php
        $relatedFields = get_field('related_foods');
        //print_r($relatedFields);
        if($relatedFields){
            ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Related Food(s)</h2>
            <ul class="link-list min-list">
            <?php
	        foreach ( $relatedFields as $related_field ) {
	            ?>
                <li>
                    <a href="<?php echo get_the_permalink($related_field); ?>">
                        <?php echo get_the_title($related_field); ?>
                    </a>
                </li>

                <?php
                
            }
        }

        ?>
            </ul>
    </div>
    <?php
} // end while
get_footer();
?>