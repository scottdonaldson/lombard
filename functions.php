<?php

// ----- Include Advanced Custom Fields
include_once('functions/advanced-custom-fields/acf.php');
include_once('functions/acf-options-page/acf-options-page.php');
include_once('functions/acf-repeater/acf-repeater.php');

register_nav_menu('Primary Menu');

// --- Excerpt ----- //
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Admin style
function my_admin_head() {
	echo "<link rel='stylesheet' type='text/css' href='" .get_bloginfo('template_url')."/css/admin-style.css'>";
}
add_action('admin_head', 'my_admin_head');

// Custom login screen

function my_login_head() {
	echo "<link rel='stylesheet' href='".get_bloginfo('template_url')."/css/login-style.css' type='text/css'>";
}
add_action('login_head', 'my_login_head');

function loginpage_custom_link() {
	return 'http://lisalombardphd.com';
}
add_filter('login_headerurl','loginpage_custom_link');

function change_title_on_logo() {
	return 'Lisa Lombard, Ph.D.';
}
add_filter('login_headertitle', 'change_title_on_logo');

/* ------ Remove a few admin pages ----- */

	function remove_admin() {
		remove_menu_page('link-manager.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('tools.php');
		remove_menu_page('profile.php');
		remove_submenu_page( 'themes.php', 'widgets.php' );
		
		global $submenu;
		unset($submenu['edit.php'][15]); // Remove categories
	  	unset($submenu['edit.php'][16]); // Removes Post Tags
	}
	add_action('admin_menu', 'remove_admin');


// Admin footer

add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = 'Site developed by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp Sprouts</a>.';
    return $text;
}
 
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '&copy 2012.';
    return $text;
}

// Create Quotes custom post type

function create_post_type_quote() {
	register_post_type( 'quote',
		array(
		'labels' => array(
			'name' => __( 'Quotes' ),
			'singular_name' => __( 'Quote' ),
			'add_new' => _x('Add New Quote'),
			'add_new_item' => __('Add New Quote'),
			'all_items' => __('All Quotes'),
			'edit_item' => __('Edit Quote'),
			'new_item' => __('New Quote'),
			'view_item' => __('View Quote'),
			'search_items' => __('Search Quotes'),
			'not_found' =>  __('No Quotes found'),
			'not_found_in_trash' => __('No Quotes found in Trash'),
			'parent_item_colon' => ''
			),
		'public' => true,
		'menu_position' => 4			
		)
	);
}
add_action( 'init', 'create_post_type_quote' );

?>