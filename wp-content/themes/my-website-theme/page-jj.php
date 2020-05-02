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
		$events = new WP_Query(array(
			'posts_per_page' => -1,
			'post_type'=> 'event',
			'meta_key' => 'event_date', // for
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
		    'meta_query' => array(
		        array(
		            'key' => 'event_date',
		            'compare' => '>=',
		            'value' => date('Ymd'),
		            'type' => 'numeric'
		        )
		    )
		));
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
