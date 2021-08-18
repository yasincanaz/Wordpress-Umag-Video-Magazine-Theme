<?php
/**
 * mag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mag
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'umag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function umag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mag, use a find and replace
		 * to change 'umag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'umag', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_image_size( "umag-liddle-slider", 354, 243, true);
		add_image_size("umag_six_slider_liddle",140, 140 ,true);
		add_image_size("umag_six_slider_big",800, 566 ,true);
		add_image_size("umag_mid_slider_big",500, 343 ,true);
		add_image_size("umag_widget_posts",70, 70 ,true);
		add_image_size("umag_single_posts",1200, 721 ,true);
		add_image_size( "umag_archive_page", 268, 237, true );
		add_image_size( "umag-team", 160, 160, true );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1'  => esc_html__( 'Primary', 'umag' ),
				'footer'  => esc_html__( 'Footer', 'umag' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'post-formats', array( 'aside', 'video' ) );
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'umag_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'umag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function umag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'umag_content_width', 670 );
}
add_action( 'after_setup_theme', 'umag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function umag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'umag' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="widget single-sidebar-widget p-30 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="section-heading">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Home page Right Slider', 'umag' ),
			'id'            => 'home-right',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget p-30 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="section-heading"> <h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Home page left Slider', 'umag' ),
			'id'            => 'home-left',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget p-30 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="section-heading"> <h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);
	/**FOOTER */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1 Slider', 'umag' ),
			'id'            => 'home-footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2 Slider', 'umag' ),
			'id'            => 'home-footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3 Slider', 'umag' ),
			'id'            => 'home-footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4 Slider', 'umag' ),
			'id'            => 'home-footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'umag' ),
			'before_widget' => '<section id="%1$s" class="single-sidebar-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	
}
add_action( 'widgets_init', 'umag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
/* Master Stylesheet 
@import url(css/font-awesome.min.css);
@import url(css/themify-icons.css);
@import url(css/owl.carousel.min.css);
@import url(css/animate.css);
@import url(css/magnific-popup.css);


	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

:: 3.0 Base CSS */
function umag_scripts() {
	wp_enqueue_style("bootstrap",get_template_directory_uri()."/assets/css/bootstrap.min.css",array(), _S_VERSION);
	wp_enqueue_style("umag_classy-nav",get_template_directory_uri()."/assets/css/classy-nav.css",array(), _S_VERSION);
	wp_enqueue_style("font-awesome","https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css",array(), _S_VERSION);
	wp_enqueue_style("owl-carousel",get_template_directory_uri()."/assets/css/owl.carousel.min.css",_S_VERSION);
	wp_enqueue_style("themify-icons",get_template_directory_uri()."/assets/css/themify-icons.css",_S_VERSION);	
	wp_enqueue_style("umag-animate",get_template_directory_uri()."/css/animate.css",_S_VERSION);
	wp_enqueue_style("magnific-popup",get_template_directory_uri()."/css/magnific-popup.css",_S_VERSION);


	wp_enqueue_script("popper",get_template_directory_uri()."/assets/js/popper.min.js",array("jquery"),_S_VERSION,true);
	wp_enqueue_script( "bootstrap",get_template_directory_uri()."/assets/js/bootstrap.min.js",array(),_S_VERSION,true);
	wp_enqueue_script( "umag_plugins",get_template_directory_uri()."/assets/js/plugins.js",array(),_S_VERSION,true);
	wp_enqueue_script( "umag_active",get_template_directory_uri()."/assets/js/active.js",array(),_S_VERSION,true);
	wp_enqueue_script("sharer",get_template_directory_uri()."/assets/js/sharer.min.js",array("jquery"),_S_VERSION,true);
	wp_enqueue_script("umag-script",get_template_directory_uri()."/assets/js/theme.js",array("jquery"),_S_VERSION,true);
	wp_localize_script( 'umag-script','umag_object',array(

		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'home_url' => home_url( '/')

	));
	wp_enqueue_style( "google-raleway","https://fonts.googleapis.com/css?family=Raleway:400,700" );
	wp_enqueue_style( "google-Fredoka+One","https://fonts.googleapis.com/css?family=Fredoka+One" );
	wp_enqueue_style("umag_Poppins","https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700");
	wp_enqueue_style( 'umag-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_add_inline_style( "umag-style", umag_custom_style());
	wp_enqueue_style( "umag-home-page",get_template_directory_uri()."/hoome-page.css",_S_VERSION );
	wp_enqueue_style( "umag-home-pages",get_template_directory_uri()."/home.css",_S_VERSION );
	wp_enqueue_style( "umag-home-pasges",get_template_directory_uri()."/ssss.css",_S_VERSION );

	wp_style_add_data( 'umag-style', 'rtl', 'replace' );

	wp_enqueue_script( 'umag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'umag_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Meta box customize
 */
require get_template_directory()."/inc/meta-box.php";
/**
 * Comments Template
 */
require get_template_directory(). "/inc/comment-template.php";
/**
 * Widgets
 */
require get_template_directory()."/inc/widgets/umag-post-widget.php";

require get_template_directory()."/inc/widgets/umag-social-media-widget.php";

require get_template_directory()."/inc/widgets/umag-video-posts.php";

require get_template_directory()."/inc/widgets/umag-footer-social-widget.php";

require get_template_directory()."/inc/widgets/umag-sort-category.php";

require get_template_directory()."/inc/widgets/umag-footer-tags.php";

require get_template_directory()."/inc/widgets/umag-footer-category.php";
/**Tgmpa Classes */
require get_template_directory()."/inc/classes/class-tgm-plugin-activation.php";
/**Kirki theme options include */
require get_template_directory()."/inc/theme_options.php";
/**
 * Ajax
 */
require get_template_directory()."/inc/ajax-functions.php";
/**
 * Short Code
 */
require get_template_directory()."/inc/short-code.php";
/**
 * Custom post type
 */
require get_template_directory()."/inc/custom-post-type.php";
/**
 * Demo İmport
*/
require get_template_directory()."/inc/demo-import.php";

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

