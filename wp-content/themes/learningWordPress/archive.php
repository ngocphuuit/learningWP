<?php get_header(); ?>

 	<?php if ( have_posts() ) : ?>

 		<h2><?php
 		if ( is_category() ) {
 			single_cat_title();
 		} elseif ( is_tag() ) {
 			single_tag_title();
 		} elseif ( is_author() ) {
 			the_post();
 			echo 'Author Archive: ' . get_the_author();
 			rewind_posts();
 		} elseif ( is_day() ) {
 			echo 'Day archive';
 		} elseif ( is_month() ) {
 			echo 'Month';
 		} elseif ( is_year() ) {
 			echo 'Year';
 		} else {
 			echo 'Archives';
 		}

 		?></h2>

		<?php while (have_posts()) : the_post() ; ?>

			<?php get_template_part('content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php echo "Not found"; ?>

	<?php endif; ?>

<?php get_footer(); ?>