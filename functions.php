<?php
/**
 * diariorumbosur functions and definitions
 *
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since diariorumbosur 1.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'diariorumbosur_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since diariorumbosur 1.0
 */
function diariorumbosur_setup() {
 
    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain( 'diariorumbosur', get_template_directory() . '/languages' );
    
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'diariorumbosur' ),
    ) );
}
endif; // diariorumbosur_setup
add_action( 'after_setup_theme', 'diariorumbosur_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since diariorumbosur 1.0
 */
function diariorumbosur_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'diariorumbosur' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'diariorumbosur' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'diariorumbosur_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function diariorumbosur_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
 }
add_action( 'wp_enqueue_scripts', 'diariorumbosur_scripts' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 */

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}

function portada_init() {
    // create a new taxonomy
    register_taxonomy(
        'Portada',
        'post',
        array(
            'label' => __( 'Portada' ),
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portada' ),
        )
    );
}
add_action( 'init', 'portada_init' );