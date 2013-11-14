<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package diariorumbosur
* @since diariorumbosur 1.0
*/
 
get_header(); ?>


<div id="top" class="content-area">
    <div id="top-content" class="site-content" role="main">
    
<?php // las 3 noticias destacadas
$args = array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'Portada',
            'field' => 'slug',
            'terms' => 'uno'
        )
    )
);

// The Query
$the_query = new WP_Query( $args);
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        get_template_part( 'destacadas', get_post_format() );
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>

    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
 
<?php // con foto, primera de la izquierda

$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'Portada',
            'field' => 'slug',
            'terms' => 'tapa'
        )
    )
);
// The Query
$the_query = new WP_Query( $args);
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        get_template_part( 'detapa', get_post_format() );
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>



<?php // primer bloque de negativas

$args = array(
    'posts_per_page' => 2,
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'Portada',
            'field' => 'slug',
            'terms' => 'par-1'
        )
    )
);



// The Query
$the_query = new WP_Query( $args);

// The Loop

if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();?>
        <div class='<?php echo (++$j % 2 == 0) ? 'evenpost' : 'oddpost'; ?>'>
        <?php
        get_template_part( 'pares', get_post_format() );
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
 
    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>