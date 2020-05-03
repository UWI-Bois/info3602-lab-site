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
        <button class="height-btn">
            Click me to see my height.
        </button>
        <div id="height-div"> </div>
        <hr>

        <button class="bill-btn">
            Click me to see James' bill.
        </button>
        <div id="bill-div"> </div>
        <hr>

        <button class="fruit-btn">
            Click me to see what fruit I like.
        </button>
        <div id="fruit-div"> </div>
        <hr>

        <button class="todo-btn">
            Click me to see my tasks.
        </button>
        <div id="todo-div"> </div>
        <hr>


    </div>

<?php
} // end while
get_footer();
?>