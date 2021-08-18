<?php
if(! defined("ABSPATH")){
    die();
}
function umag_demo_files() {
	return array(
		array(
			'import_file_name'           => 'Demo 1',
			'import_file_url'            => 'https://cihxe.com/demo-content/content.xml',
			'import_widget_file_url'     => 'https://cihxe.com/demo-content/widget.wie',
			'import_customizer_file_url' => 'https://cihxe.com/demo-content/settings.dat',
			'import_preview_image_url'   => 'https://cihxe.com/demo-content/screenshot.png',
			'import_notice'              => esc_html__( 'Make sure all plugins are installed before importing the demo', 'umag' ),
			'preview_url'                => 'https://www.cihxe.com/',
		),
        
	);
}
add_filter( 'ocdi/import_files', 'umag_demo_files' );

function umag_after_demo_import() {
	$main_menu = get_term_by( 'name', 'Ana Menü', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menü', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'menu-1'      => $main_menu->term_id,
		'footer-menu' => $footer_menu->term_id,
	) );

	$front_page_object = get_page_by_title( 'Home' );
	$blog_page_object = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_object->ID );
	update_option( 'page_for_posts', $blog_page_object->ID );

	$share_options = get_option( 'mashsb_settings' );
	$share_options[ 'visible_services' ] = '1';
	$share_options[ 'mashsharer_position' ] = 'manuel';
	$share_options[ 'sharecount_title' ] = 'PAYLAŞIM';
	$share_options[ 'border_radius' ] = '3';
	$share_options[ 'networks' ][ 0 ][ 'name' ] = 'Paylaş';
	$share_options[ 'networks' ][ 1 ][ 'name' ] = 'Tweetle';
	$share_options[ 'networks' ][ 2 ][ 'id' ] = 'subscribe';
	$share_options[ 'networks' ][ 2 ][ 'name' ] = 'Abone Ol';
	$share_options[ 'networks' ][ 2 ][ 'status' ] = '1';
	update_option( 'mashsb_settings', $share_options );

	$like_options = get_option( 'wp_ulike_settings' );
	$like_options[ 'posts_group' ] = array( 'template' => 'wpulike-default', 'enable_auto_display' => 0 );
	$like_options[ 'comments_group' ] = array( 'template' => 'wpulike-default', 'enable_auto_display' => 0 );
	update_option( 'wp_ulike_settings', $like_options );

	$views_options = get_option( 'views_options' );
	$views_options[ 'count' ] = '0';
	$views_options[ 'template' ] = '%VIEW_COUNT%';
	update_option( 'views_options', $views_options );
}

add_action( 'pt-ocdi/after_import', 'umag_after_demo_import' );

function umag_before_widget_import() {
	$widget_areas = array(
		'sidebar-1' => array(),
	);

	update_option( 'sidebars_widgets', $widget_areas );
}

add_action( 'pt-ocdi/before_widgets_import', 'umag_before_widget_import' );

function umag_before_content_import() {
	$hello_world = get_page_by_title( 'Merhaba dünya!', OBJECT, 'post' );

	if( ! empty( $hello_world ) ) {
		$hello_world->post_status = 'draft';
		wp_update_post( $hello_world );
	}
}

add_action( 'pt-ocdi/before_content_import', 'umag_before_content_import' );