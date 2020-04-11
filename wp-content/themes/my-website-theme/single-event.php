single-event.php -> details per EVENT post
<?php // exercise 1 lecture 3
get_header();
while(have_posts()){ // iterate through all posts
    the_post(); // curr post
    // jump out of php into html
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Event Home
                </a>
            </p>
        </div>
        <div class="generic-content">
            <? the_content(); ?>
        </div>
        <?php
        $relatedFields = get_field('related_programs');
        //print_r($relatedFields);
        if($relatedFields){
            ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Related Program(s)</h2>
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