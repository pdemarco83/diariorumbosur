<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="archivo-header">
        <div class="fecha"><?php the_date(); ?></div>
        <span>
        <?php 
            $category = get_the_category(); 
            echo $category[0]->cat_name;
        ?>
        </span>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->