<?php // exercise 1 lecture 3
//the_ID();
if(!is_user_logged_in()){
	wp_redirect(esc_url(site_url('/')));
	exit; // save resources
}
get_header();
while(have_posts()){ // get this specific food post
    the_post(); // curr post
    // jump out of php into html
    pageBanner(array());
    ?>
    <div class="container container--narrow page-section">

        <div class="generic-content">
            <div class="row">
                <div class="col">
			        <?php the_post_thumbnail(); ?>
                </div>

                <div class="col">
			        <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
        wp_reset_postdata();
        $relatedProfs = new WP_Query(array(
	        'posts_per_page' => -1,
	        'post_type'=> 'jj',
	        'orderby' => 'title',
	        'order' => 'ASC',
	        'meta_query' => array(
		        array(
			        'key' => 'related_foods',
			        'compare' => 'LIKE',
			        'value' => '"' . get_the_ID() . '"' // ensure we compare strings not ints
		        )
            )
        ));
//        echo 'ran prof query';
        if($relatedProfs->have_posts()){
//            echo "found related profs";
            ?>
            <hr class="section-break">
            <h2 class="headline headline--medium"> <?php echo get_the_title(); ?> Munchers </h2>
            <ul class="link-list min-list">
            <?php
            while($relatedProfs->have_posts()){
                $relatedProfs->the_post();
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                            <?php
                            the_title();
//                            echo ' ; pageid = '; the_ID();
                            ?>
                    </a>
                </li>
                <?php
            }
            ?>
            </ul>
            <?php
	        wp_reset_postdata();
        } // end if profs
        ?>

        <hr class="section-break">
        <a href="<?php echo get_post_type_archive_link('jj'); ?>" class="btn btn--large btn--blue">View All JJs</a>
    </div>
    <?php
} // end while
get_footer();
?>