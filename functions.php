<?php
/**
 * willingness functions and definitions
 *
 * @package willingness
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 510; /* pixels */

if ( ! function_exists( 'willingness_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function willingness_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on willingness, use a find and replace
	 * to change 'willingness' to the name of your theme in all the template files
	 */	load_theme_textdomain( 'willingness', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'willingness' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Enable support for Editor Style
	 */
	add_editor_style( 'custom-editor-style.css' );
}
endif; // willingness_setup
add_action( 'after_setup_theme', 'willingness_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function willingness_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/images/background.png',
	);

	$args = apply_filters( 'willingness_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	}
}
add_action( 'after_setup_theme', 'willingness_register_custom_background' );


/**
 * Register widgetized area
 */

register_sidebar( array(
    'name' => __( 'Left Sidebar', 'willingness' ),
    'id' => 'sidebar-1',
    'description' => __( 'Widgets in this area will be shown on the left-hand side.', 'willingness' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  register_sidebar( array(
    'name' => __( 'Right Sidebar', 'willingness' ),
    'id' => 'sidebar-2',
    'description' => __( 'Widgets in this area will be shown on the right-hand side.', 'willingness' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  /* Register footer Sidebar  */

  register_sidebar( array(
    'name' => __( 'Footer 1', 'willingness' ),
    'id' => 'footer-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer 2', 'willingness' ),
    'id' => 'footer-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer 3', 'willingness' ),
    'id' => 'footer-3',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer 4', 'willingness' ),
    'id' => 'footer-4',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<hr class="widget-top-hr">'.'<h1 class="widget-title">',
    'after_title' => '<hr class="widget-below-hr">'.'</h1>',
  ) );

  /* End of footer Sidebar */


/**
 * Enqueue scripts and styles
 */
function willingness_scripts() {
	wp_enqueue_style( 'willingness-style', get_stylesheet_uri() );

	wp_enqueue_script( 'willingness-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'willingness-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'willingness-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'willingness_scripts' );

/**
 * Implement the Custom Header feature.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require( get_template_directory() . '/inc/extras.php' );

/**
 * Customizer additions.
 */
require( get_template_directory() . '/inc/customizer.php' );

/**
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

/* Custom Header */

$args = array(
	'flex-width'    => true,
	'width'         => 1140,
	'flex-height'    => true,
	'height'        => 350,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'header_text' => false,
	'uploads' => true,
);
add_theme_support( 'custom-header', $args );


/* Body Class */

// Add specific CSS class by filter
add_filter('body_class','willingness_body_class');
function willingness_body_class($classes) {

	$options = willingness_get_theme_options();
	$sampleradiobutton = $options['sample_radio_buttons'];
	$radiobutton = $options['radio_buttons'];
	$headercheckbox = $options['sample_checkbox'];

	if ($headercheckbox == 'on')
		$classes[] = 'no-header';
	if($sampleradiobutton == 'no')
		$classes[] = 'no-description';
	if ($radiobutton == 'no')
		$classes[] = 'no-searchbar';
	if (!is_active_sidebar('sidebar-1'))
		$classes[] = 'no-left';
	if (!is_active_sidebar( 'sidebar-2' ))
		$classes[] = 'no-right';

	return $classes;
}