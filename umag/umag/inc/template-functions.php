<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function umag_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}
	if (is_page_template("page-home.php")) {
		$i = 0;
		if (is_active_sidebar("home-right")) {
			$i++;
		}
		if (is_active_sidebar("home-left")) {
			$i++;
		}
		$home_slider_classes = "";
		switch ($i) {
			case 0:
				$home_slider_classes = "home-no-slider";
				break;
			case 1:
				$home_slider_classes = "home-one-slider";
				break;
			case 2:
				$home_slider_classes = "thome-two-slider";
				break;
		}
		$classes[] = $home_slider_classes;
	}
	return $classes;
}
add_filter('body_class', 'umag_body_classes');

function umag_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'umag_pingback_header');

function umag_drowpdown_classes($classes)
{
	$classes[] = "dropdown";
	return $classes;
}
add_filter("nav_menu_submenu_css_class", "umag_drowpdown_classes");

function umag_register_required_plugins()
{

	$plugins = array(

		array(
			'name'      => 'Kirki Customizer Framework',
			'slug'      => 'kirki',
			'required'  => false,
		),

		array(
			'name'      => 'WP-PostViews',
			'slug'      => 'wp-postviews',
			'required'  => false,
		),
		array(
			'name'      => 'WP ULike – Most Advanced WordPress Marketing Toolkit',
			'slug'      => 'wp-ulike',
			'required'  => false,
		),
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => false,
		),
		array(
			'name'      => 'Social Media Share Buttons | MashShare',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
		array(
			'name'      => 'MC4WP: Mailchimp for WordPress',
			'slug'      => 'mashsharer',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'umag',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		"parent_slug"  => "themes.php",
		"capability"   => "edit_theme_options",
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'umag_register_required_plugins');

function umag_custom_style()
{
	$umag_color_template = get_theme_mod("umag_color_template", "#ed3974");
	ob_start();
?>
	<style>
		.form-control:focus,
		.pagination .page-item .page-link:hover,
		.pagination .page-item .page-link:focus {
			border-color: <?php echo sanitize_hex_color($umag_color_template); ?>;
		}

		.notfound-search button,
		.pagination .page-item .current,
		.pagination .page-item .page-link:hover,
		.pagination .page-item .page-link:focus,
		#scrollUp:hover,
		#scrollUp:focus,
		.footer-area .footer-widget .footer-tags li a:hover,
		.footer-area .footer-widget .footer-tags li a:focus,
		.mag-btn,
		.single-youtube-channel .youtube-channel-content .subscribe-btn,
		.single-featured-post .post-share-area .share-info .sharebtn:hover,
		.trending-post-slides .owl-prev:hover,
		.trending-post-slides .owl-prev:focus,
		.trending-post-slides .owl-next:hover,
		.trending-post-slides .owl-next:focus,
		.featured-video-posts-slide .owl-prev:hover,
		.featured-video-posts-slide .owl-prev:focus,
		.featured-video-posts-slide .owl-next:hover,
		.featured-video-posts-slide .owl-next:focus,
		.most-viewed-videos-slide .owl-prev:hover,
		.most-viewed-videos-slide .owl-prev:focus,
		.most-viewed-videos-slide .owl-next:hover,
		.most-viewed-videos-slide .owl-next:focus,
		.sports-videos-slides .owl-prev:hover,
		.sports-videos-slides .owl-prev:focus,
		.sports-videos-slides .owl-next:hover,
		.sports-videos-slides .owl-next:focus,
		.hero-blog-post .post-content .video-play:hover,
		.hero-blog-post .post-content .video-play:focus,
		.header-area .mag-main-menu .submit-video,
		.header-area,
		.preloader,
		.hero-area .owl-prev:hover,
		.hero-area .owl-prev:focus,
		.hero-area .owl-next:hover,
		.hero-area .owl-next:focus {
			background-color: <?php echo sanitize_hex_color($umag_color_template); ?>;
		}

		.classynav .menu .current-menu-item a,
		.single-team-member .team-member-content span,
		.notfound .notfound-404 h1,
		.single-catagory-post .post-content .post-meta-2 a:hover,
		.single-catagory-post .post-content .post-meta-2 a:focus,
		.single-catagory-post .post-content .post-title:hover,
		.single-catagory-post .post-content .post-title:focus,
		.single-catagory-post .post-content .post-meta a,
		.post-details-content .post-meta-2 a:hover,
		.post-details-content .post-meta-2 a:focus,
		.post-details-content .post-meta a,
		.mag-breadcrumb .breadcrumb .breadcrumb-item a:hover,
		.mag-breadcrumb .breadcrumb .breadcrumb-item a:focus,
		.footer-area .copywrite-area .footer-nav ul li a:hover,
		.footer-area .copywrite-area .footer-nav ul li a:focus,
		.footer-area .footer-widget .footer-widget-nav ul li a:hover,
		.footer-area .footer-widget .footer-widget-nav ul li a:focus,
		.footer-widget .single-blog-post .post-content .post-title:hover,
		.catagory-widgets li a:hover,
		.catagory-widgets li a:focus,
		.single-blog-post .post-content .post-meta a:hover,
		.single-blog-post .post-content .post-meta a:focus,
		.single-blog-post.style-4 .post-content .post-meta a:hover,
		.single-blog-post.style-4 .post-content .post-meta a:focus,
		.single-blog-post.style-3 .post-content .post-meta a:hover,
		.single-blog-post.style-3 .post-content .post-meta a:focus,
		.single-featured-post .post-share-area .post-meta a:hover,
		.single-featured-post .post-share-area .post-meta a:focus,
		.single-featured-post .post-content .post-meta a,
		.single-featured-post .post-content .post-title:hover,
		.single-featured-post .post-content .post-title:focus,
		.single-blog-post .post-content .post-title:hover,
		.single-blog-post .post-content .post-title:focus,
		.mag-main-menu .classy-navbar .classynav ul li a:hover,
		.header-area .mag-main-menu .classy-navbar .classynav ul li a:focus,
		.header-area .mag-main-menu .top-search-area form button:hover,
		.header-area .mag-main-menu .login-btn:hover,
		.header-area .mag-main-menu .login-btn:focus,
		.hero-blog-post .post-content .post-meta a,
		.hero-blog-post .post-content .post-title:hover,
		.hero-blog-post .post-content .post-title:focus,
		.single-trending-post .post-content .post-cata,
		.single-trending-post .post-content .post-title:hover,
		.single-trending-post .post-content .post-title:focus {
			color: <?php echo sanitize_hex_color($umag_color_template); ?> !important;
		}

		.section-heading,
		.footer-area .footer-widget .widget-title {
			border-left-color: <?php echo sanitize_hex_color($umag_color_template); ?>;
		}

		<?php if (current_user_can("manage_options")) : ?>@media (min-width:780px) {
			.is-sticky #sticker,.breakpoint-on .classy-navbar .classy-menu{
				top: 32px !important;
			}
		}

		@media (max-width:780px) {
			#masthead .is-sticky #sticker,.breakpoint-on .classy-navbar .classy-menu {
				top: 46px !important;
			}
		}

		@media (max-width:600px) {
			#masthead .is-sticky #sticker ,.breakpoint-on .classy-navbar .classy-menu{
				top: 0px !important;
			}
			.is-sticky .breakpoint-on .classy-navbar .classy-menu.menu-on{
				top:0px !important;
			}
			.breakpoint-on .classy-navbar .classy-menu.menu-on{
				top:46px !important;
			}
		}

		<?php endif; ?>@media (max-width:700px) {
			#umag_user_nickname {
				display: none;
			}
		}
	</style>
<?php
	return str_replace(array("<style>", "</style>"), array("", ""), ob_get_clean());
}
function umag_default_customizer($wp_customize)
{
	$wp_customize->remove_control("header_textcolor");
}
add_action("customize_register", "umag_default_customizer");

function umag_comment_fields_order($fields)
{
	$comment_fields = $fields["comment"];
	$cookies_field = $fields["cookies"];

	unset($fields["comment"]);
	unset($fields["cookies"]);

	$fields["comment"] = $comment_fields;
	$fields["cookies"] = $cookies_field;

	return $fields;
}
add_filter("comment_form_fields", "umag_comment_fields_order");
