<?php
/**
* Template Name: Template #2 (Agro)
* @package diariorumbosur
* @since diariorumbosur 1.0
*/
?>


<?php
 
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
    <div class="template-2">

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
			<span><?php echo $date = get_the_date('l, j \d\e\ F \d\e Y') ?></span>
		</a></h1>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
 
 
<?php else : ?>
 
<?php get_template_part( 'no-results', 'archive' ); ?>
 
<?php endif; ?>
 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->
<div class="template-2-sidebar">  
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
