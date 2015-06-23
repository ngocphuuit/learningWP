<?php get_header(); ?>

 	<?php if ( have_posts() ) : ?>

		<?php while (have_posts()) : the_post() ; ?>

			<article class="post page">
				<div class="column-container clearfix">
					<div class="title-column">
						<h2><?php echo the_title();?> </h2>
					</div>

					<div class="text-column">
						<p><?php echo the_content();?></p>
					</div>
				</div>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<?php echo "Not found"; ?>

	<?php endif; ?>

<?php get_footer(); ?>