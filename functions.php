<?php
/**
 * TallestPoppy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TallestPoppy
 */

if ( ! function_exists( 'tallestpoppy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tallestpoppy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TallestPoppy, use a find and replace
	 * to change 'tallestpoppy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tallestpoppy', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tallestpoppy' ),
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
	add_theme_support( 'custom-background', apply_filters( 'tallestpoppy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tallestpoppy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tallestpoppy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tallestpoppy_content_width', 640 );
}
add_action( 'after_setup_theme', 'tallestpoppy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tallestpoppy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tallestpoppy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tallestpoppy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tallestpoppy_scripts() {
	wp_enqueue_style( 'tallestpoppy-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'tallestpoppy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	//Smooth scroll
    wp_enqueue_script( 'smoothscroll', get_template_directory_uri().'/js/jquery.smooth-scroll.min.js', array('jquery'), '1.5.2', false );
    
    wp_enqueue_script( 'scroll-script', get_template_directory_uri().'/js/scripts.js' );

	wp_enqueue_script( 'tallestpoppy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	

	wp_enqueue_style('flexslider', get_template_directory_uri() . '/js/flexslider.css');
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.6.0');
	wp_enqueue_script('flexslider-init', get_template_directory_uri() . '/js/flexslider-init.js', array('flexslider'), '0.1');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tallestpoppy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );

//enqueues our locally supplied font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

function load_fonts() {
            wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,300,800');

            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts');
    

    
 ?>