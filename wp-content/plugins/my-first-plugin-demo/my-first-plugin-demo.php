<?php
/**
* Plugin Name: My First Plugin Demo
* Plugin URI: localhost/wordpress
* Description: First plugin 
* Version: 1.0
* Author: NoPu NGuyen
* Author URI: localhost/wordpress
* License: GPLv2 or later
*/

$mfwp_prefix = 'mfwp_';
$mfwp_plugin_name = 'My First Wordpress Plugin';

$mfwp_options = get_option('mfwp_settings');

include('includes/scripts.php');
include('includes/data-processing.php');
include('includes/displayfunction.php');
include('includes/admin-page.php');
?>
<?php

add_action('admin_menu', 'myfirstplugin_admin_actions' );
function myfirstplugin_admin_actions() {
	add_options_page('MyFirstPluginDemo', 'MyFirstPluginDemo', 'manage_options', __FILE__, 'myfirstplugin_admin' );
}
function myfirstplugin_admin() {
?>
	<div class="wrap">
		<h4>A more intersting hello world plugin</h4>
		<h3>This plugin will search the DB for all draft posts and display their title and ID</h3>
		<p>click the button below to begin the search</p>
		<br />
		<form action="" method="POST">
			<input type="submit" name="search_draft_posts" value="Search" class="button-primary">
		</form>
		<br />
		<?php if (isset($_POST['search_draft_posts'])) { ?>
			<table class="widefat">
				<thead>
					<tr>
						<th>Post title</th>
						<th>Post ID</th>
					</tr>
				</thead>
				<tfoot>
					<th>Post title</th>
					<th>Post ID</th>
				</tfoot>
				<tbody>
					<?php
						global $wpdb;
						$mytestdrafts = $wpdb->get_results(
							"SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'draft'"
						);

						foreach ($mytestdrafts as $mytestdraft) {
							?>
								<tr>
									<?php echo "<td>".$mytestdraft->post_title."</td>"; ?>
									<?php echo "<td>".$mytestdraft->ID."</td>"; ?>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
			<?php } ?>
	</div>
<?php
}

if (!class_exists('My_First_Plugin_Demo')) {
	class My_First_Plugin_Demo {
		function __construct() {
			if (!function_exists('add_shortcode')) {
				return;
			}
			add_shortcode( 'fbgraph', array(&$this, 'create_fbgraph_shortcode') );
		}

		function create_fbgraph_shortcode($args, $content) {
			$get_info = wp_remote_get('https://graph.facebook.com/'.$args['username']);
        $get_avatar = "https://graph.facebook.com/".$args['username']."/picture?type=large";
        $dc_info = json_decode($get_info['body'], true);
        $dc_avatar = json_decode($get_avatar['data'], true);
 
        // Tạo biến cho dễ xử lý.
        $fb_id = $dc_info['id'];
        $fb_username = $dc_info['username'];
        $fb_url = $dc_info['link'];
        $fb_name = $dc_info['first_name'];
        // Ghi giới tính thành tiếng Việt
        if ($dc_info['gender'] == 'male') {
                $fb_gender = "Nam";
        } else if ($dc_info['gender'] == female) {
                $fb_gender = "Nữ";
        } else {
                $fb_gender = "Chưa xác định giới tính!";
        }
 
        ob_start();?>
				<div class="fb-info">
				<h5>Thông tin của <?php echo $fb_name; ?></h5>
				<div class="avatar"><img alt="" src="<?php echo $get_avatar; ?>" /></div>
				<div class="info"><strong>ID của bạn: </strong> <?php echo $fb_id; ?>
				 <strong>Username: </strong> <?php echo $fb_username; ?>475
				 <strong>Giới tính: </strong> <?php echo $fb_gender; ?></div>
				</div>
			<?php 
			$result = ob_get_contents();
 			return $result;
		}
	}
}

function mfpd_load() {
	global $mfpd;
	$mfpd = new My_First_Plugin_Demo;
}

add_action('plugins_loaded', 'mfpd_load' );

?>