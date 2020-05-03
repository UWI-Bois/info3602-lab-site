<?php
/*
 * page for testing and revising,
 * this page will test custom: pages, post types, queries
 */
get_header(); // load header file
while (have_posts()) { // grab page from admin dash (jj page)
the_post(); // curr post
pageBanner($args=null); // load banner for page
?>

	<div class="container container--narrow page-section">
		<h1>JJs</h1>
		<?php
		$jjs = new WP_Query(
			array(
				'post_type' => 'jj',
				'posts_per_page' => -1,

			)
		);
		while($jjs->have_posts()){
			$jjs->the_post();
		?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
		<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>

	<hr>

	<div class="container container--narrow page-section">
		<h1>All Events</h1>
		<?php
		$events = new WP_Query(
			array(
				'post_type' => 'event',
				'posts_per_page' => -1,
			)
		);
		while($events->have_posts()){
			$events->the_post();
		?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
		<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>
	<hr>

	<div class="container container--narrow page-section">
		<h1>Math Events</h1>
		<?php
		/*
		 * how meta queries work:
		 * meta_key -> a custom field label
		 * meta_value -> the value pulled from the label
		 *
		 * in this case, we have to check for each related subject per event, and then
		 * choose to print it or not.
		 */
		$events = new WP_Query(array(
			'posts_per_page' => -1,
			'post_type'=> 'event',
			'order' => 'ASC'
		));
		while($events->have_posts()){
			$events->the_post();
			$relatedPrograms = get_field('related_programs');
			if(!$relatedPrograms) break;
			foreach ( $relatedPrograms as $related_program ) {
				if(get_the_title($related_program) == 'Maths'){
		?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
		<?php
				} // end if
			}// end fore
		} // end while
		wp_reset_postdata(); // reset query
		?>
	</div>

	<hr>

	<div class="container container--narrow page-section">
		<h1>Upcoming Events</h1>
		<?php
		/*
		 * how meta queries work:
		 * meta_key -> a custom field label
		 * meta_value -> the value pulled from the label
		 *
		 * query based on custom field = event_date
		 */
//		echo date("m", strtotime("May"));
		$events = new WP_Query(
			array(
				'post_type' => 'event',
				'numberposts' => -1,
				'meta_key' => 'event_date', // returns a numerical format for a date
				'orderby' => 'meta_value_num',
				'meta_query' => array(
					array(
						'key' => 'event_date',
						'compare' => '>=',
						'value' => date("Ymd"),
						'type' => 'DATE'
					)
				)

			)
		);
		while($events->have_posts()){
			$events->the_post();
			?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
			<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>

	<hr>

	<div class="container container--narrow page-section">
		<h1>All Professors</h1>
		<?php
		$events = new WP_Query(
			array(
				'post_type' => 'professor',
				'posts_per_page' => -1,
			)
		);
		while($events->have_posts()){
			$events->the_post();
			?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
			<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>
	<hr>

	<div class="container container--narrow page-section">
		<h1>All Professor Cards</h1>
		<?php
		$events = new WP_Query(
			array(
				'post_type' => 'professor',
				'posts_per_page' => -1,
			)
		);
		while($events->have_posts()){
			$events->the_post();
			?>
			<ul class="professor-card">
				<li class="professor-card__list-item">
					<a class="professor-card" href="<?php the_permalink(); ?>">
						<img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="">
						<span class="professor-card__name">
                            <?php
                            the_title();
                            //                            echo ' ; pageid = '; the_ID();
                            ?>
                        </span>
					</a>
				</li>
			</ul>
			<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>

	<hr>

	<div class="container container--narrow page-section">
		<h1>All Maths (id=138) Professors</h1>
		<?php
		$events = new WP_Query(
			array(
				'post_type' => 'professor',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'related_programs',
						'compare' => 'LIKE',
						'value' => '138'
					)
				)
			)
		);
		while($events->have_posts()){
			$events->the_post();
			?>
			<ul class="link-list min-list">
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
			<?php
		} // endwhile for jjs post
		wp_reset_postdata(); // reset query
		?>
	</div>

<?php  ?>

<?php
}//end while for pulling jj page
get_footer();
?>
