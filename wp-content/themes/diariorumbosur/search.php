<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
 
get_header(); ?>

<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">
<header class="page-header">
<h1 class="page-title">Archivo de Noticias</h1>
</header>


    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>


        <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'archivo_de_noticias', get_post_format() );
        ?>

        <?php endwhile; ?>

        <?php diariorumbosur_content_nav( 'nav-below' ); ?>

    <?php else : ?>
 
        <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>

 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<div id="secondary" class="widget-area" role="complementary">
    <div class="archivo">
        <br /><br /><br />
        <?php echo do_shortcode('[searchandfilter fields="search,category,post_date" types=",checkbox,daterange" headings=",Secciones,Rango de Fechas" submit_label="Buscar" add_search_param="1" operators="and,or,or" search_placeholder="Buscar..."]'); ?>
    </div>
</div><!-- #secondary .widget-area -->
 
<?php get_footer(); ?>