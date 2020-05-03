<?php // exercise 1 lecture 3
get_header();
while (have_posts()) { // grab the post for this page
    the_post(); // curr post
    pageBanner($args=null);
?>


    <div class="container container--narrow page-section">

        <?php $theParent = wp_get_post_parent_id(get_the_ID()); if($theParent) {?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Back to <?php echo get_the_title($theParent);?>
                        </a>
                        <span class="metabox__main">
                    <?php echo the_title(); ?>
                </span>
                    </p>
                </div>
        <?php } //else echo "no kiddies"; ?>

        <?php
            $testArray = get_pages(array(
                'child_of' => get_the_ID()
            ));
            if($theParent or $testArray){
        ?>
                <div class="page-links">
                    <h2 class="page-links__title">
                        <a href="<?php echo get_permalink($theParent); ?>">
                            <?php echo get_the_title($theParent); ?>
                        </a>
                    </h2>
                    <ul class="min-list">
                        <?php
                        if($theParent) $findChildrenOf = $theParent; // if the page is the parent page, then get the children of this parent page
                        else $findChildrenOf = get_the_ID(); // otherwise, we are on the child page
                        wp_list_pages(array(
                            'title_li' => NULL, // remove page title
                            'child_of' => $findChildrenOf, // page id for something idk
                            'sort_column' => 'menu_order'
                        ));
                        ?>
                    </ul>
                </div>
        <?php } ?>



<!--        <div class="page-links">-->
<!--            <h2 class="page-links__title"><a href="#">About Us</a></h2>-->
<!--            <ul class="min-list">-->
<!--                <li class="current_page_item"><a href="#">Our History</a></li>-->
<!--                <li><a href="#">Our Goals</a></li>-->
<!--            </ul>-->
<!--        </div>-->

        <div class="generic-content">
            <p> <?php the_content(); ?> </p>

        </div>

    </div>

<?php
} // end while
get_footer();
?>