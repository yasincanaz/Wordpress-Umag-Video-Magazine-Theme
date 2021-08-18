<?php
if(! defined("ABSPATH")){
    return;
}
if(! class_exists("kirki")){
    return;
}
Kirki::add_config( 'umag', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
/**Header Start */
Kirki::add_section( 'umag_header', array(
    'title'          => esc_html__( 'Header Settings', 'umag' ),
    'panel'          => '',
    'priority'       => 1,
) );
/**İcon Settings */
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_login_icon_edit',
	'label'    => esc_html__( 'Login icon edit', 'umag' ),
	'section'  => 'umag_header',
	'default'  => esc_html__( 'fa-user', 'umag' ),
	'priority' => 10,
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_login_edit_link',
	'label'    => esc_html__( 'Login Link edit1', 'umag' ),
	'section'  => 'umag_header',
	'default'  => esc_html__( "google.com", 'umag' ),
	'priority' => 10,
] );
/**submit Button */
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_header_button_text',
	'label'    => esc_html__( 'Button text edit', 'umag' ),
	'section'  => 'umag_header',
	'default'  => esc_html__("SUBMİT POST", 'umag' ),
	'priority' => 10,
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_header_button_link',
	'label'    => esc_html__( 'Button link edit', 'umag' ),
	'section'  => 'umag_header',
	'default'  => esc_html__("#", 'umag' ),
	'priority' => 10,
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_header_button_mobile_icon',
	'label'    => esc_html__( 'Button mobile icon', 'umag' ),
	'section'  => 'umag_header',
	'default'  => esc_html__("fa-cloud-upload-alt", 'umag' ),
	'priority' => 10,
] );
/**Colors template */
Kirki::add_field( 'umag', [
	'type'        => 'color',
	'settings'    => 'umag_color_template',
	'label'       => __( 'Umag color template', 'umag' ),
	'section'     => 'colors',
	'default'     => '#ed3974',
    "priority"    => 1
] );
/**Home Page Setting */
Kirki::add_panel( 'umag_home', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Home page settings', 'umag' )
) );
Kirki::add_section( 'umag_home_slide', array(
    'title'          => esc_html__( 'Slider Settings', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 1,
) );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_admin_user',
	'label'    => esc_html__( 'Which users can post content on the homepage', 'umag' ),
	'section'  => 'umag_home_slide',
	'description' => esc_html__('separate with commas','umag'),
	'default'  => esc_html__("yasincanaz", 'umag' ),
	'priority' => 1,
] );
/**slider */
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_slider_default',
	'label'       => esc_html__( 'Disable slider', 'umag' ),
	'section'     => 'umag_home_slide',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
Kirki::add_field( 'umag', [
	'type'        => 'number',
	'settings'    => 'umag_slide_count',
	'label'       => esc_html__( 'Umag slide count', 'umag' ),
	'section'     => 'umag_home_slide',
	'default'     => 3,
	'choices'     => [
		'min'  => 1,
		'max'  => 20,
		'step' => 1,
	],
] );
/**category select */
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_category_filter',
	'label'       => esc_html__( 'Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_home_slide',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
/**Slider Wrıting arragment */
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_slide_category_sırala',
	'label'       => esc_html__( 'Category arrangment', 'umag' ),
	'section'     => 'umag_home_slide',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );

/**Liddle Slider */
Kirki::add_section( 'umag_liddle_slider', array(
    'title'          => esc_html__( 'Liddle Slider Settings', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 2,
) );
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_liddle_slider_default',
	'label'       => esc_html__( 'Disable slider', 'umag' ),
	'section'     => 'umag_liddle_slider',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_liddle_text',
	'label'    => esc_html__( 'Liddle slider text edit', 'umag' ),
	'section'  => 'umag_liddle_slider',
	'default'  => esc_html__("TRENDING NOW", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'        => 'number',
	'settings'    => 'umag_liddle_slide_count',
	'label'       => esc_html__( 'Umag slide count', 'umag' ),
	'section'     => 'umag_liddle_slider',
	'default'     => 3,
	'choices'     => [
		'min'  => 1,
		'max'  => 20,
		'step' => 1,
	],
] );
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_liddle_cat_filter',
	'label'       => esc_html__( 'Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_liddle_slider',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_liddle_slide_category',
	'label'       => esc_html__( 'Category arrangment', 'umag' ),
	'section'     => 'umag_liddle_slider',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );
/**Six slider */
Kirki::add_section( 'umag_six_slider', array(
    'title'          => esc_html__( 'Six Slider Settings', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 3,
) );
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_six_slider_default',
	'label'       => esc_html__( 'Disable slider', 'umag' ),
	'section'     => 'umag_six_slider',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_six_text',
	'label'    => esc_html__( 'Six slider text edit', 'umag' ),
	'section'  => 'umag_six_slider',
	'default'  => esc_html__("FEATURED VİDEOS", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'        => 'number',
	'settings'    => 'umag_six_slide_count',
	'label'       => esc_html__( 'Umag slide count', 'umag' ),
	'section'     => 'umag_six_slider',
	'default'     => 6,
	'choices'     => [
		'min'  => 6,
		'max'  => 40,
		'step' => 1,
	],
] );
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_six_cat_filter',
	'label'       => esc_html__( 'Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_six_slider',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_six_slide_category',
	'label'       => esc_html__( 'Category arrangment', 'umag' ),
	'section'     => 'umag_six_slider',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );
/**Mid slider */
Kirki::add_section( 'umag_mid_slider', array(
    'title'          => esc_html__( 'Mid Slider Settings', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 4,
) );
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_mid_slider_default',
	'label'       => esc_html__( 'Disable slider', 'umag' ),
	'section'     => 'umag_mid_slider',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_mid_text',
	'label'    => esc_html__( 'Mid slider text edit', 'umag' ),
	'section'  => 'umag_mid_slider',
	'default'  => esc_html__("MOST VİEWED VİDEOS", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'        => 'number',
	'settings'    => 'umag_mid_slide_count',
	'label'       => esc_html__( 'Umag slide count', 'umag' ),
	'section'     => 'umag_mid_slider',
	'default'     => 3,
	'choices'     => [
		'min'  => 1,
		'max'  => 40,
		'step' => 1,
	],
] );
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_mid_cat_filter',
	'label'       => esc_html__( 'Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_mid_slider',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_mid_slide_category',
	'label'       => esc_html__( 'Category arrangment', 'umag' ),
	'section'     => 'umag_mid_slider',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );
/**Bottom Slider */
Kirki::add_section( 'umag_bottom_slider', array(
    'title'          => esc_html__( 'Bottom Slider Settings', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 4,
) );
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_bottom_slider_default',
	'label'       => esc_html__( 'Disable slider', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_bottom_text',
	'label'    => esc_html__( 'Bottom slider text edit', 'umag' ),
	'section'  => 'umag_bottom_slider',
	'default'  => esc_html__("SPORTS VİDEOS", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'        => 'number',
	'settings'    => 'umag_bottom_slide_count',
	'label'       => esc_html__( 'Umag Top slide count', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'default'     => 2,
	'choices'     => [
		'min'  => 2,
		'max'  => 40,
		'step' => 1,
	],
] );
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_bottom_cat_filter',
	'label'       => esc_html__( 'Top slider Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_bottom_slide_category',
	'label'       => esc_html__( 'Top slider category arrangment', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );
Kirki::add_field( 'umag', array(
	'type'        => 'select',
	'settings'    => 'umag_bottom_cat_filter_2',
	'label'       => esc_html__( 'Top slider Leave blank to select all categories', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( array(
		'taxonomy' => 'category',
		"hide_empty"=>0,
		"count" => -1,
	)),
) );
Kirki::add_field( 'umag', [
	'type'        => 'select',
	'settings'    => 'umag_bottom_slide_category_2',
	'label'       => esc_html__( 'Top slider category arrangment', 'umag' ),
	'section'     => 'umag_bottom_slider',
	'default'     => 'date',
	'placeholder' => esc_html__( 'Select an category..', 'umag' ),
	'multiple'    => 1,
	'choices'     => [
		'date' => esc_html__( 'By date', 'umag' ),
		'views' => esc_html__( 'By popularty', 'umag' ),
		'random' => esc_html__( 'By random', 'umag' ),
		'comments' => esc_html__( 'Cy the number of comments', 'umag' ),
	],
] );
/**
 * FOOTER
 */
Kirki::add_section( 'umag_footer', array(
    'title'          => esc_html__( 'Footer', 'umag' ),
    'panel'          => 'umag_home',
    'priority'       => 4,
) );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_footer_text',
	'label'    => esc_html__( 'Footer Copyright', 'umag' ),
	'section'  => 'umag_footer',
	'default'  => esc_html__("All rights reserved | This template is made with ", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_footer_link_text',
	'label'    => esc_html__( 'Footer Copyright Link Text', 'umag' ),
	'section'  => 'umag_footer',
	'default'  => esc_html__("YasinCanaz", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_footer_link',
	'label'    => esc_html__( 'Footer Copyright Link', 'umag' ),
	'section'  => 'umag_footer',
	'default'  => esc_html__("https://yasincanaz.com", 'umag' ),
	'priority' => 2,
] );
/**
 * POST SETTİNGS
 */
Kirki::add_section( 'umag_post', array(
    'title'          => esc_html__( 'Post page settings', 'umag' ),
    'panel'          => '',
    'priority'       => 4,
) );
Kirki::add_field( 'umag', [
	'type'     => 'text',
	'settings' => 'umag_post_page_short_code',
	'label'    => esc_html__( 'Short Code', 'umag' ),
	'section'  => 'umag_post',
	'default'  => esc_html__("", 'umag' ),
	'priority' => 2,
] );
Kirki::add_field( 'umag', [
	'type'        => 'switch',
	'settings'    => 'umag_post_page_author_active',
	'label'       => esc_html__( 'Disable Author', 'umag' ),
	'section'     => 'umag_post',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'umag' ),
		'off' => esc_html__( 'Disable', 'umag' ),
	],
] );
/**
 * Page settings
 */
Kirki::add_section( 'page_settings', array(
    'title'          => esc_html__( 'Page Settings', 'umag' ),
    'priority'       => 160,
) );

Kirki::add_field( 'umag', array(
	'type'     => 'select',
	'settings' => 'umag_login_page',
	'label'    => esc_html__( 'Login page select', 'umag' ),
	'section'  => 'page_settings',
	'priority' => 1,
	'multiple' => 1,
	'choices'  => Kirki_Helper::get_posts(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'page'
		) ,
	),
) );


Kirki::add_field( 'umag', array(
	'type'     => 'select',
	'settings' => 'umag_register_page',
	'label'    => esc_html__( 'Register page select', 'umag' ),
	'section'  => 'page_settings',
	'priority' => 1,
	'multiple' => 1,
	'choices'  => Kirki_Helper::get_posts(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'page'
		) ,
	),
) );