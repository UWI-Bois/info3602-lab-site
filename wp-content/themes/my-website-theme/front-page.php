<?php get_header(); ?>
<?php
// these queries will override any existing parameters from functions.php
$homepagePosts = new WP_Query(array(
    'posts_per_page' => 4,
//    'category_name' => 'Award',
    'orderby' => 'title'
));
$homepageEvents = new WP_Query(array(
    'posts_per_page' => 4,
    'post_type'=> 'event',
    'meta_query' => array(
            array(
	            'key' => 'event_date',
	            'compare' => '>=',
	            'value' => date('Ymd'),
	            'type' => 'numeric'
            )
    )
));
?>
<!--inside body-->
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/library-hero.jpg'); ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!!!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h4 class="headline headline--small">Be wary of <strong> enemy stand users</strong></h4>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

            <?php
            while($homepageEvents -> have_posts()){
                $homepageEvents->the_post();
            ?>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                        <?php
                        $eventDate = new DateTime(get_field('event_date'));
                        ?>
                        <span class="event-summary__month"><?php echo $eventDate->format('M') ?></span>
                        <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?><a href="<?php the_permalink(); ?>" class="nu gray"><br>Learn more</a></p>
                    </div>
                </div>
            <?php
            }// end while
            wp_reset_postdata();
            ?>



            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>

        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

            <?php
            while($homepagePosts -> have_posts()){ //
                $homepagePosts -> the_post();
                ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
	                    <?php
//	                    $eventDate = get_the_date();
//	                    $eventDate = new DateTime(get_field('date'));
	                    ?>
                        <span class="event-summary__month"><?php echo get_the_date('M') ?></span>
                        <span class="event-summary__day"><?php echo get_the_date('d') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>



            <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/bus.jpg'); ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/apples.jpg'); ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/bread.jpg'); ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Bizarre University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
</div>

<!---->
<!--<a href="https://www.w3schools.com">Visit W3Schools</a>-->
<!--<p> testing orange teknologee  </p>-->
<?php //// exercise 1 lecture 3
//while(have_posts()){ // iterate through all posts
//    the_post(); // curr post
//    // jump out of php into html
//    ?>
<!--    <h2>-->
<!--    <a href="--><?php //the_permalink(); ?><!--">-->
<!--    --><?// the_title(); ?>
<!--    </a>-->
<!--    </h2>-->
<!--    <p> --><?php //the_content(); ?><!-- </p>-->
<!--    <hr>-->
<!--    --><?php
//} // end while
//?>

<!-- ending body-->
<?php get_footer(); ?>
