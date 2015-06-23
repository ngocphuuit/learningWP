<?php get_header(); ?>

<div class="site-content clearfix">
	<div class="main-column">
		<?php if ( have_posts() ) : ?>

			<?php while (have_posts()) : the_post() ; ?>

				<?php get_template_part('content', 'page'); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php echo "Not found"; ?>

		<?php endif; ?>
	</div>

	<?php get_sidebar(); ?>

</div>

 	

<?php get_footer(); ?>