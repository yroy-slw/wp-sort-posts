<?php
/*
Template Name: My admin page
*/
?>
<?php get_header(); ?>

	<div id="sortable">

		<?php 
		$args= array(
			'cat' => 3, //My cat ID or all posts
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);

		$loop = new WP_Query($args); ?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div id="<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>

		<?php endwhile; wp_reset_postdata(); ?>

	</div>
		
<?php get_footer(); ?>        