<?php get_header(); ?>

	<!--Site content -->
		<div class="site-content clearfix">
			<!--Main column-->
			<div class="main-column">
			 	<?php if ( have_posts() ) : ?>

					<?php while (have_posts()) : the_post() ; ?>

					<?php get_template_part('content', get_post_format()); ?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php echo "Not found"; ?>

				<?php endif; ?>
			</div>
			<!--End Main column-->

			<?php get_sidebar(); ?>
		</div>
	<!--End Site content -->

<?php get_footer(); ?>