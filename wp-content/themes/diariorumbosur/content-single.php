<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
 
        <div class="entry-meta">
            <?php the_date('l, j \d\e F \d\e Y'); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'diariorumbosur' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
 
</article><!-- #post-<?php the_ID(); ?> -->