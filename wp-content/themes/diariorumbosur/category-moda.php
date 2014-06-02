<?php
/**
* The template for displaying Archive pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package diariorumbosur
* @since diariorumbosur 1.0
*/
 
get_header(); ?>
 
<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">
 
<?php if ( have_posts() ) : ?>
 
<header class="page-header">
    <h1 class="page-title">
        <?php
                printf( __( '%s', 'diariorumbosur' ), '<span>' . single_cat_title( '', false ) . '</span>' );
 
        ?>

</header><!-- .page-header -->
 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="moda">

    <a class="pic" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"> 
    	<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail('large');
			} 
		?>
    </a>
    <h1 class="entry-title">
    	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
    		<?php the_title(); ?>
    		<span>
    			<?php echo $excerpt = get_the_excerpt() ?>
			</span></a></h1>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
 
 
<?php else : ?>
 
<?php get_template_part( 'no-results', 'archive' ); ?>
 
<?php endif; ?>
 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>
