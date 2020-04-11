archive-program page -> programs from the past
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
        <ul class="link-list min-list">
            <?php
            while(have_posts()){
                the_post();
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
                <?php
            }// end while
            ?>
            <br>
            <?php
            echo paginate_links();
            ?>
        </ul>



<?php

    get_footer();
?>