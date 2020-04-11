<?php // exercise 1 lecture 3
get_header();
while(have_posts()){ // iterate through all posts
    the_post(); // curr post
    pageBanner(array());
    // jump out of php into html
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


        <?php
        $relatedFields = get_field('related_programs'); // array of post objects
        //print_r($relatedFields);
        if($relatedFields){
            ?>
                <div class="row">
                    <div class="col">
                        <hr class="section-break">
                        <h2 class="headline headline--medium">Subject(s) Taught</h2>

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
        wp_reset_postdata();
        ?>
                        </ul>
                    </div>
            </div>
        </div>
        <hr class="section-break">
        <a href="<?php echo get_post_type_archive_link('professor'); ?>" class="btn btn--large btn--blue">View All Professors</a>
    </div>


	<?php
} // end while
get_footer();
?>