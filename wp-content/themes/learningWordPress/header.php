<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewpost" content="width=device-width">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
	<header class="site-header">

		<!-- Header search -->
		<div class="hd-search">
			<?php get_search_form(); ?>
		</div>
		<!-- End Header search -->

		<h1><?php bloginfo('name'); ?></h1>
		<h5><?php bloginfo('description');?></h5>

		<nav class="site-nav">
			<?php 
				$args = array(
					'theme_location' => 'primary'
				);
			?>
			<?php wp_nav_menu($args); ?>
		</nav>
	</header>