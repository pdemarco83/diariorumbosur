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
    $content_width = 1024; /* pixels */

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
        'name' => __( 'Barra lateral', 'diariorumbosur' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Banner 1', 'diariorumbosur' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Banner 2', 'diariorumbosur' ),
        'id' => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Tiempo', 'diariorumbosur' ),
        'id' => 'sidebar-4',
    ) );

    register_sidebar( array(
        'name' => __( 'Alerta', 'diariorumbosur' ),
        'id' => 'sidebar-5',
    ) );
}
add_action( 'widgets_init', 'diariorumbosur_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function diariorumbosur_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
  
 }
add_action( 'wp_enqueue_scripts', 'diariorumbosur_scripts' );


if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 1000, 1000, true ); // default Post Thumbnail dimensions (cropped)
// additional image sizes
// delete the next line if you do not need additional image sizes
//add_image_size( 'moda-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}

/* Cropear imágenes */

if(!get_option("medium_crop"))
    add_option("medium_crop", "1");
else
    update_option("medium_crop", "1");

if(!get_option("large_crop"))
    add_option("large_crop", "1");
else
    update_option("large_crop", "1");    


// Creating the widget COTIZACIÓN

class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('Cotización', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Cotización en ARS para DRS', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
// echo __( 'Hello, World!', 'wpb_widget_domain' );
// echo $args['after_widget'];
?>
<div class="cotizacion">
    <h1 class="widget-title">Cotizaciones en ARS</h1>

    <?php

    $from   = 'USD'; /*change it to your required currencies */
    $to     = 'ARS';
    $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
    $handle = @fopen($url, 'r');

    if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
    }
    $allData = explode(',',$result); /* Get all the contents to an array */
    $dollarValue = $allData[1];

    echo '<p><b>DÓLAR</b> '.$dollarValue.' | ';

    $from   = 'EUR'; /*change it to your required currencies */
    $to     = 'ARS';
    $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
    $handle = @fopen($url, 'r');

    if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
    }
    $allData = explode(',',$result); /* Get all the contents to an array */
    $euroValue = $allData[1];

    echo '<b>EURO</b> '.$euroValue.'<br />';
    
    ?>

</div>

<?php


}
        
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('Portada', 'post', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Portada', 'taxonomy general name' ),
            'singular_name' => _x( 'Portada', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Locations' ),
            'all_items' => __( 'All Locations' ),
            'parent_item' => __( 'Parent Portada' ),
            'parent_item_colon' => __( 'Parent Portada:' ),
            'edit_item' => __( 'Edit Portada' ),
            'update_item' => __( 'Update Portada' ),
            'add_new_item' => __( 'Add New Portada' ),
            'new_item_name' => __( 'New Portada Name' ),
            'menu_name' => __( 'Portada' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'portada', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );


?>