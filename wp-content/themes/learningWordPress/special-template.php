<?php get_header();
	/*
	Template Name: Special Template
	*/
 ?>
 	<?php if ( have_posts() ) : ?>

		<?php while (have_posts()) : the_post() ; ?>

			<article class="post page">

				<h2><?php echo the_title();?> </h2>

				<div class="info-box">
					<h4>Disclaimer Title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, sed itaque explicabo quis. Odit labore quia, ipsa officia maxime rem qui quibusdam quis aliquam recusandae tenetur accusantium doloremque quasi nulla!</p>
				</div>

				<p><?php echo the_content();?></p>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<?php echo "Not found"; ?>

	<?php endif; ?>

<?php get_footer(); ?>