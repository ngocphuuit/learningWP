<?php
function mfwp_options_page() {

	global $mfwp_options;

	ob_start(); ?>	
	<div class="wrap">
		<h2>My first WP plugin Options</h2>
		<form action="options.php" method="POST">
			<?php settings_fields( 'mfwp_settings_group' ); ?>

			<h4><?php _e('Enable', 'mfwp_domain'); ?></h4>
			<p>
			<input type="checkbox" id="mfwp_settings[enable]" name="mfwp_settings[enable]" value="1" <?php checked( '1', $mfwp_options['enable']); ?>>
				<label class="description" for="mfwp_settings[enable]"><?php echo _e('Display the follow me on twitter link', 'mfwp_domain'); ?></label>
			</p>


			<h4><?php _e('Twitter Information', 'mfwp_domain'); ?></h4>
			<p>
				<label for="mfwp_settings[twitter_url]" class="description"><?php _e('Enter your twitter URL'); ?></label>
				<input type="text" id="mfwp_settings[twitter_url]" name="mfwp_settings[twitter_url]" value="<?php echo $mfwp_options['twitter_url']; ?>">
			</p>

			<h4><?php _e('Theme', 'mfwp_domain'); ?></h4>
			<p>
				<?php $styles = array('blue', 'red'); ?>
				<select name="mfwp_settings[theme]" id="mfwp_settings[theme]">
					<?php foreach ($styles as $style) { ?>
							<?php if ($mfwp_options['theme'] == $style) { $selected = 'selected = "selected"'; } else { $selected = ''; } ?>
							<option value="<?php echo $style; ?>" <?php echo $selected; ?> > <?php echo $style; ?> </option>
					<?php	} ?>
				</select>
			</p>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php echo _e('Save Options'); ?>">
			</p>
		</form>
	</div>
<?php
	echo ob_get_clean();
} 


function mfwp_add_options_link() {
	// add_object_page( 'My First WP Plugin', 'My First Plugin', 'manage_options', 'mfwp-options', 'mfwp_options_page');
	add_options_page( 'My First WP Plugin', 'My First Plugin', 'manage_options', 'mfwp-options', 'mfwp_options_page');
}

add_action('admin_menu', 'mfwp_add_options_link' );

function mfwp_register_settings() {
	register_setting( 'mfwp_settings_group', 'mfwp_settings');
}

add_action('admin_init', 'mfwp_register_settings');