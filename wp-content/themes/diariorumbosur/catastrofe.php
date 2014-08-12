<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="catastrofe">
        <a class="pic" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
        <!--<?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>-->
        <?php the_post_thumbnail( 'catastrofe-thumb' ); ?>
        </a>
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
            <?php the_title(); ?>
        
            <span>
                <?php if($post->post_excerpt) the_excerpt(); ?>
            </span>   
        </h1>
        </a>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

