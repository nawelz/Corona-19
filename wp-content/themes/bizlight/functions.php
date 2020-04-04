<?php
/**
 * Bizlight functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bizlight
 */
/**
 * Get the path for the file ( to support child theme )
 *
 * @since Bizlight 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('bizlight_file_directory') ){
	function bizlight_file_directory( $file_path ){
		$located = locate_template( $file_path );
		if( '' != $located ){
			return $located;
		}
	}
}
/**
 * require bizlight int.
 */

$bizlight_init_file_path = bizlight_file_directory('inc/init.php');
require $bizlight_init_file_path;

if ( ! function_exists( 'bizlight_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bizlight_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bizlight, use a find and replace
	 * to change 'bizlight' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bizlight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'home-main-slider', 1361 ,533, true );
	add_image_size( 'home-blog-post-thumbnails-image', 365, 247, true );

	add_theme_support( 'custom-header' );



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bizlight' ),
		'social' => esc_html__( 'Social Menu', 'bizlight' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bizlight_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*woocommerce support*/
	add_theme_support( 'woocommerce' );

	/* guternberg support */
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
}
endif; // bizlight_setup
add_action( 'after_setup_theme', 'bizlight_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bizlight_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bizlight_content_width', 640 );
}
add_action( 'after_setup_theme', 'bizlight_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function bizlight_scripts() {

	global $bizlight_customizer_all_values;

	/*Bootstrap css*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/frameworks/bootstrap/css/bootstrap.css', array(), '3.3.4' );/*added*/

	/*google font*/
	$bizlight_font_family_h1_h6 = $bizlight_customizer_all_values['bizlight-font-family-h1-h6'];
	$bizlight_font_family_site_identity = $bizlight_customizer_all_values['bizlight-font-family-site-identity'];

	if( $bizlight_font_family_h1_h6 == $bizlight_font_family_site_identity ){
		wp_enqueue_style( 'bizlight-googleapis', '//fonts.googleapis.com/css?family='.$bizlight_font_family_h1_h6.'', array(), '' );/*added*/
	}
	else{
		wp_enqueue_style( 'bizlight-googleapis-heading', '//fonts.googleapis.com/css?family='.$bizlight_font_family_h1_h6.'', array(), '' );/*added*/
		wp_enqueue_style( 'bizlight-googleapis-site-identity', '//fonts.googleapis.com/css?family='.$bizlight_font_family_site_identity.'', array(), '' );/*added*/
	}
	wp_enqueue_style( 'bizlight-googleapis-other-font-family', '//fonts.googleapis.com/css?family=Raleway', array(), '' );/*added*/
	/*Font-Awesome-master*/
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/frameworks/Font-Awesome/css/font-awesome.min.css', array(), '4.4.0' );/*added*/

	/*animate css*/
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/frameworks/wow/css/animate.min.css', array(), '3.4.0' );/*added*/
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/frameworks/wow/js/wow.min.js', array('jquery'), '1.1.2', 1);

	/*main style*/
    wp_enqueue_style( 'bizlight-style', get_stylesheet_uri() );

    /*jquery start*/
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/frameworks/jquery.easing/jquery.easing.js', array('jquery'), '0.3.6', 1);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/frameworks/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.5', 1);

	/*cycle2 slider*/
	wp_enqueue_script( 'cycle2-script', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.js', array( 'jquery' ), '2.1.6' );
	wp_enqueue_script( 'cycle2-script-flip', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.flip.js', array( 'jquery' ), '20140128' );
	wp_enqueue_script( 'cycle2-script-scrollVert', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.scrollVert.js', array( 'jquery' ), '20140128' );
	wp_enqueue_script( 'cycle2-script-shuffle', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.shuffle.js', array( 'jquery' ), '20140128' );
	wp_enqueue_script( 'cycle2-script-tile', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.tile.js', array( 'jquery' ), '20140128' );
	wp_enqueue_script( 'cycle2-script-swipe', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.swipe.js', array( 'jquery' ), '20121120' );

    wp_enqueue_script( 'bizlight-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && !(is_front_page()) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	/*custom js*/
	wp_enqueue_script('bizlight-custom', get_template_directory_uri() . '/assets/js/bizlight-custom.js', array('jquery'), '1.0.0', 1);
	// Load the html5 shiv and respond js.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/frameworks/html5shiv/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/frameworks/respond/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'bizlight_scripts' );

/**
 * Custom template tags for this theme.
 */
$bizlight_template_tags = bizlight_file_directory('inc/template-tags.php');
require $bizlight_template_tags;

/**
 * Custom functions that act independently of the theme templates.
 */
$bizlight_extras_tags = bizlight_file_directory('inc/extras.php');
require $bizlight_extras_tags;


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Jetpack compatibility file.
 */
$bizlight_jetpack_tags = bizlight_file_directory('inc/jetpack.php');
require $bizlight_jetpack_tags;

/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/bizlight/class-customize.php' );

/* Plugin recommendation */
require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );


/*breadcrum function*/

if ( ! function_exists( 'bizlight_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function bizlight_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/frameworks/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );
	}

endif;

add_action( 'tgmpa_register', 'bizlight_register_required_plugins' );
if ( ! function_exists( 'bizlight_register_required_plugins' ) ) :
	/**
	 * Rise block plugin recommendation.
	 *
	 * @since 1.3.5
	 * 
	 */
	function bizlight_register_required_plugins() {	
		$plugins = array(
			array(
				'name'     => esc_html__( 'Rise Blocks - A Complete Gutenberg Page builder', 'bizlight' ),
				'slug'     => 'rise-blocks',
				'required' => false,
			),
		);

		tgmpa( $plugins );
	}
endif;

add_action( 'enqueue_block_editor_assets', 'bizlight_editor_assets');
if( !function_exists( 'bizlight_editor_assets' ) ):
	function bizlight_editor_assets(){
		wp_enqueue_style( 'editor-style', get_template_directory_uri().'/editor-style.css' );
	}
endif;