<?php get_header(); ?>

 	<?php if ( have_posts() ) : ?>

 		<h2>Search results for: <?php the_search_query(); ?></h2>

		<?php while (have_posts()) : the_post() ; ?>

			<?php get_template_part('content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php echo "Not found"; ?>

	<?php endif; ?>

<?php get_footer(); ?>