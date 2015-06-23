<?php
function learningWordPress_resource() {
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'learningWordPress_resource' );

/*Get top ancestor Id*/
function get_top_ancestor_id() {
	global $post;
	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;
}

// Custom Post Type

function tao_custom_post_type() {
  // Bien $lable de chua cac text lien quan den ten hien thi cua Post Type trong Admin
  $label = array(
    'name' => 'Các loại sản phẩm',
    'singular' => 'Loại sản phẩm',
    'menu_name' => 'Loại sản phẩm'
  );

  // Bien $args la nhung tham so quan trong trong Post Type
  $args = array(
    'labels' => $label,
    'description' => 'Post type dang san pham',
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'author',
      'thumbnail',
      'comments',
      'trackbacks',
      'revisions',
      'custom-fields'
    ), //cac tinh nang duoc ho tro trong post type
    'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
    'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, false thì giống như Page
    'public' => true, //Kích hoạt post type
    'show_ui' => true, //Hiển thị khung quản trị như Post/Page
    'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
    'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
    'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
    'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
    'menu_icon' => '', //Đường dẫn tới icon sẽ hiển thị
    'can_export' => true, //Có thể export nội dung bằng Tools -> Export
    'has_archive' => true, //Cho phép lưu trữ (month, date, year)
    'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
    'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
    'capability_type' => 'post' //
  );

  register_post_type('sanpham', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
}

add_action( 'init', 'tao_custom_post_type' );

add_filter('pre_get_posts','lay_custom_post_type');
function lay_custom_post_type($query) {
  if (is_home() && $query->is_main_query ())
    $query->set ('post_type', array ('post','sanpham'));
    return $query;
}

// Register Siderbar

register_sidebar(array(
  'name' => 'Block afer content',
  'id' => 'block-after-content',
  'description' => 'Khu vuc hien thi sidebar duoi moi bai viet',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>'
));

// Customize excert word count length
// Read more content.
function custom_excerpt_length() {
	return 25;
}

add_filter( 'excerpt_length', 'custom_excerpt_length');


// Theme setup

function learningWordPress_setup() {

	/* Navigation menus */

	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu'),
		'main-nav' => 'Menu Chinh',
	));


	//Add Featured image support

	add_theme_support( 'post-thumbnails' );
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, array('left','top'));

	// Add Post Format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

add_action('after_setup_theme', 'learningWordPress_setup' );

// Add widger location

function ourWidgetsInit() {

	register_sidebar( array(
		'name'	=> 'Sidebar',
		'ID'		=> 'sidebar1'
	));

}

add_action('widgets_init', 'ourWidgetsInit');