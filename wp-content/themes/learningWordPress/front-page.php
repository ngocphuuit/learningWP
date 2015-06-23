<?php get_header(); ?>

<div class="site-content clearfix">

	<h3>Custom HTML here</h3>

	<?php if ( have_posts() ) : ?>

		<?php while (have_posts()) : the_post() ; ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php echo "Not found"; ?>

	<?php endif; ?>

	<!-- opinion post loop begins here -->
	<div class="home-columns clearfix">
		
		<div class="one-half">
			<?php $demoPosts = new WP_Query('cat=1&posts_per_page=2'); ?>
			<?php if ( $demoPosts->have_posts() ) : ?>
				<?php while ( $demoPosts->have_posts() ) : $demoPosts->the_post(); ?>
					<h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
					<?php the_excerpt(); ?>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		</div>

		<div class="one-half last">
			<?php $newsPosts = new WP_Query('cat=3&posts_per_page=2'); ?>
			<?php if ( $newsPosts->have_posts() ) : ?>
				<?php while ( $newsPosts->have_posts() ) : $newsPosts->the_post(); ?>
					<h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
					<?php the_excerpt(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

	</div>

	<h3>Custom HTML here</h3>

</div>

<?php get_footer(); ?>