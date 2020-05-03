<?php // exercise 1 lecture 3
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

        <ul class="min-list link-list" id="my-notes">
<!--            query the wordpress db for relevant posts-->
            <?php
            $userNotes = new WP_Query(
                    array(
	                    'post_type' => 'note',
	                    'posts_per_page' => -1,
	                    'author' => get_current_user_id() // get notes for signed in user
                    )
            );

            while($userNotes->have_posts()){
                $userNotes->the_post();
            ?>
                <li>
                    <input class="note-title-field" value="<?php echo esc_attr(get_the_title()); ?>">

<!--                    crud buttons-->
                    <span class="edit-note">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Edit
                    </span>
                    <span class="delete-note">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete
                    </span>

                    <textarea class="note-body-field"><?php echo esc_attr(strip_tags(get_the_content())); ?></textarea>
                </li>

                <?php
                wp_reset_postdata();
            }// end while
                ?>

        </ul>


    </div>

<?php
} // end while
get_footer();
?>