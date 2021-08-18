<?php
if(! defined("ABSPATH")){
    die();
}
// Register Custom Post Type Team
function create_team_cpt() {

	$labels = array(
		'name' => _x( 'Teams', 'Post Type General Name', 'umag' ),
		'singular_name' => _x( 'Team', 'Post Type Singular Name', 'umag' ),
		'menu_name' => _x( 'Teams', 'Admin Menu text', 'umag' ),
		'name_admin_bar' => _x( 'Team', 'Add New on Toolbar', 'umag' ),
		'archives' => __( 'Team Archives', 'umag' ),
		'attributes' => __( 'Team Attributes', 'umag' ),
		'parent_item_colon' => __( 'Parent Team:', 'umag' ),
		'all_items' => __( 'All Teams', 'umag' ),
		'add_new_item' => __( 'Add New Team', 'umag' ),
		'add_new' => __( 'Add New', 'umag' ),
		'new_item' => __( 'New Team', 'umag' ),
		'edit_item' => __( 'Edit Team', 'umag' ),
		'update_item' => __( 'Update Team', 'umag' ),
		'view_item' => __( 'View Team', 'umag' ),
		'view_items' => __( 'View Teams', 'umag' ),
		'search_items' => __( 'Search Team', 'umag' ),
		'not_found' => __( 'Not found', 'umag' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'umag' ),
		'featured_image' => __( 'Featured Image', 'umag' ),
		'set_featured_image' => __( 'Set featured image', 'umag' ),
		'remove_featured_image' => __( 'Remove featured image', 'umag' ),
		'use_featured_image' => __( 'Use as featured image', 'umag' ),
		'insert_into_item' => __( 'Insert into Team', 'umag' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'umag' ),
		'items_list' => __( 'Teams list', 'umag' ),
		'items_list_navigation' => __( 'Teams list navigation', 'umag' ),
		'filter_items_list' => __( 'Filter Teams list', 'umag' ),
	);
	$args = array(
		'label' => __( 'Team', 'umag' ),
		'description' => __( 'Team Area', 'umag' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'capability_type' => 'post',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'create_team_cpt', 0 );