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

/*z
class WordPress_Radio_Taxonomy {
        static $taxonomy = 'Portada';
        static $taxonomy_metabox_id = 'tagsdiv-Portada';
        static $post_type= 'post';

        public function load(){
                //Remove old taxonomy meta box  
                add_action( 'admin_menu', array(__CLASS__,'remove_meta_box'));  

                //Add new taxonomy meta box  
                add_action( 'add_meta_boxes', array(__CLASS__,'add_meta_box'));  

                //Load admin scripts
                add_action('admin_enqueue_scripts',array(__CLASS__,'admin_script'));

                //Load admin scripts
                add_action('wp_ajax_radio_tax_add_taxterm',array(__CLASS__,'ajax_add_term'));
        }


        public static function remove_meta_box(){  
                   remove_meta_box(static::$taxonomy_metabox_id, static::$post_type, 'normal');  
        } 


        public function add_meta_box() {  
                add_meta_box( 'portada-div', 'Portada',array(__CLASS__,'metabox'), static::$post_type ,'side','core');  
        }  
        

        //Callback to set up the metabox  
        public static function metabox( $post ) {  
                //Get taxonomy and terms  
                $taxonomy = self::$taxonomy;
      
                //Set up the taxonomy object and get terms  
                $tax = get_taxonomy($taxonomy);  
                $terms = get_terms($taxonomy,array('hide_empty' => 0));  
      
                //Name of the form  
                $name = 'tax_input[' . $taxonomy . ']';  
      
                //Get current and popular terms  
                $popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );  
                $postterms = get_the_terms( $post->ID,$taxonomy );  
                $current = ($postterms ? array_pop($postterms) : false);  
                $current = ($current ? $current->term_id : 0);  
                ?>  
      
                <div id="portada-div-<?php echo $taxonomy; ?>" class="categorydiv">
                        <!-- Display tabs-->
                        <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
                                <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
                                <li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop" tabindex="3"><?php _e( 'Most Used' ); ?></a></li>
                        </ul>

                        <!-- Display taxonomy terms -->
                        <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
                                <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
                                <?php foreach($terms as $term){
                                        $id = $taxonomy.'-'.$term->term_id;
                                        $value= (is_taxonomy_hierarchical($taxonomy) ? "value='{$term->slug}'" : "value='{$term->slug}'");
                                        echo "<li id='$id'><label class='selectit'>";
                                        echo "<input type='radio' id='in-$id' name='{$name}'".checked($current,$term->term_id,false)." {$value} />$term->slug<br />";
                                        echo "</label></li>";

                                }?>
                                </ul>
                        </div>

                        <!-- Display popular taxonomy terms -->
                        <div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
                                <ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear" >
                                <?php foreach($popular as $term){
                                        $id = 'popular-'.$taxonomy.'-'.$term->term_id;
                                        $value= (is_taxonomy_hierarchical($taxonomy) ? "value='{$term->term_id}'" : "value='{$term->slug}'");
                                        echo "<li id='$id'><label class='selectit'>";
                                        echo "<input type='radio' id='in-$id'".checked($current,$term->term_id,false)." {$value} />$term->slug<br />";
                                        echo "</label></li>";

                                }?>
                                </ul>
                        </div>

                         <p id="<?php echo $taxonomy; ?>-add" class="">
                                <label class="screen-reader-text" for="new<?php echo $taxonomy; ?>"><?php echo $tax->labels->add_new_item; ?></label>
                                <input type="text" name="new<?php echo $taxonomy; ?>" id="new<?php echo $taxonomy; ?>" class="form-required form-input-tip" value="<?php echo esc_attr( $tax->labels->new_item_name ); ?>" tabindex="3" aria-required="true"/>
                                <input type="button" id="" class="radio-tax-add button" value="<?php echo esc_attr( $tax->labels->add_new_item ); ?>" tabindex="3" />
                                <?php wp_nonce_field( 'radio-tax-add-'.$taxonomy, '_wpnonce_radio-add-tag', false ); ?>
                        </p>
                </div>
        <?php  
    }

         public function admin_script(){  
                wp_register_script( 'radiotax', get_template_directory_uri() . '/js/radiotax.js', array('jquery'), null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer  
                wp_localize_script( 'radiotax', 'radio_tax', array('slug'=>self::$taxonomy));
                wp_enqueue_script( 'radiotax' );  
        }

        public function ajax_add_term(){

                $taxonomy = !empty($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
                $term = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $tax = get_taxonomy($taxonomy);

                check_ajax_referer('radio-tax-add-'.$taxonomy, '_wpnonce_radio-add-tag');

                if(!$tax || empty($term))
                        exit();

                if ( !current_user_can( $tax->cap->edit_terms ) )
                        die('-1');

                $tag = wp_insert_term($term, $taxonomy);

                if ( !$tag || is_wp_error($tag) || (!$tag = get_term( $tag['term_id'], $taxonomy )) ) {
                        //TODO Error handling
                        exit();
                }
        
                $id = $taxonomy.'-'.$tag->term_id;
                $name = 'tax_input[' . $taxonomy . ']';
                $value= (is_taxonomy_hierarchical($taxonomy) ? "value='{$tag->term_id}'" : "value='{$term->slug}'");

                $html ='<li id="'.$id.'"><label class="selectit"><input type="radio" id="in-'.$id.'" name="'.$name.'" '.$value.' />'. $tag->name.'</label></li>';
        
                echo json_encode(array('term'=>$tag->term_id,'html'=>$html));
                exit();
        }

}

WordPress_Radio_Taxonomy::load(); */


// Creating the widget 
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




?>