<?php // lab 13
get_header();
while (have_posts()) { // grab my notes page from admin dash
    the_post();
    pageBanner($args=null);
?>


    <div class="container container--narrow page-section">
        <h1>Task 1</h1>
        <hr>
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

        <button class="book-btn">
            Click me to see books.
        </button>
        <div id="book-div"> </div>
        <hr>
        <hr>

        <h1>Task 2</h1>
        <hr>

        <input type="number" class="ineq-inp" value="0">
        <button class="ineq-btn">
            Click me to see the inequality.
        </button>
        <div id="ineq-div"> </div>
        <hr>

        <button class="fill-btn">
            Click me to see arrays and their fillings (if they are).
        </button>
        <div id="fill-div"> </div>
        <hr>

        <button class="sleep-btn">
            Click me to see if to sleep or do.
        </button>
        <div id="sleep-div"> </div>
        <hr>

        <input type="number" class="grade-inp" value="0">
        <button class="grade-btn">
            Click me to see the grade.
        </button>
        <div id="grade-div"> </div>
        <hr>

    </div>

<?php
} // end while
get_footer();
?>