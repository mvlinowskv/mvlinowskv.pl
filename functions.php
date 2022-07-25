<?php
/**
 * Crypto functions and definitions
 *
 * @package Crypto
 * @since Crypto 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 900; /* pixels */
 
if ( ! function_exists( 'crypto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function crypto_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'crypto', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /* HTML5 */
    add_theme_support( 'html5' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
 
    // Register Bootstrap 4 Navigation Walker (https://github.com/wp-bootstrap/wp-bootstrap-navwalker)
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Menu podstawowe', 'crypto' ),
        'secondary' => __('Drugie menu', 'crypto' )
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // crypto_setup
add_action( 'after_setup_theme', 'crypto_setup' );


/** 
* Altering wordpress visual editor
*
**/

function change_TinyMCE( $in ) {
  $in['paste_remove_styles'] = true;

  return $in;
}

add_filter( 'tiny_mce_before_init', 'change_TinyMCE' );


/**
 * Enqueue scripts and styles.
 */
function crypto_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css', 'style' );
    // wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/css/font-awesome.min.css', 'style' );
    wp_enqueue_style( 'crypto-style', get_template_directory_uri() .'/dist/css/style.min.css', array(), '1.0' );
    // wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0' );
    // wp_enqueue_script( 'crypto-js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0' );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/dist/js/script.min.js', array(), '1.0' );
}

add_action( 'wp_enqueue_scripts', 'crypto_scripts' );

//Google Fonts
function google_fonts() {
               wp_register_style('Google Fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
               wp_enqueue_style( 'Google Fonts');
       }

add_action('wp_print_styles', 'google_fonts');

//Material Icons

function material_icons() {
               wp_register_style('Material Icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
               wp_enqueue_style( 'Material Icons');
       }

add_action('wp_print_styles', 'material_icons');

// WordPress Titles
add_theme_support( 'title-tag' );

// Excerpt length 
function my_excerpt_length($length) {
return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');

// function home_below_hero() {
//   do_action('home_below_hero');
// }

// require_once( __DIR__ . '/inc/wc-breadcrumb.php');
// require_once( __DIR__ . '/inc/wc-unhook.php');


