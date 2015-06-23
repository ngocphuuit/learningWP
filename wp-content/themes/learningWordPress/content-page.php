<article class="post page">
<?php
	$args = array(
		'child_of' => get_top_ancestor_id(),
		'title_li' => ''
	);
?>
<?php wp_list_pages($args); ?>

	<h2><?php echo the_title();?> </h2>

	<p><?php echo the_content();?></p>

</article>