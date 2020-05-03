<?php
    get_header();


        ?>
        <div class="page-banner">
            <div class="page-banner__bg-image"
                 style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title">
                    <?php
                    the_archive_title();
//                        if(is_category()) single_cat_title();
//                        if(is_author()) echo "Posts by "; the_author();
                    ?>
                </h1>
                <div class="page-banner__intro">
                    <p><?php the_archive_description(); ?></p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <h1>Upcoming Events</h1>
            <hr>
            <?php
            while(have_posts()){
                the_post();
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
            ?>
            <br>
            <?php
            echo paginate_links();
            ?>
        </div>

    <div class="container container--narrow page-section">
        <h1>Past Events</h1>
        <hr>
		<?php
        $pastEvents = new WP_Query(
                array(
	                'post_type' => 'event',
                    'posts_per_page' => 5,
                    'meta_query' => array(
                            array(
                                    'key' => 'event_date',
                                'compare' => '<',
                                'value' => date("Ymd"),
                                'type' => 'numeric'
                            )
                    )
                )
        );
		while($pastEvents->have_posts()){
			$pastEvents->the_post();
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
            wp_reset_postdata();
		}// end while
		?>
        <br>
		<?php
		echo paginate_links();
		?>
        </div>



<?php

    get_footer();
?>