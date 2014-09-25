<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php the_excerpt(); ?>
 
        <?php if ( 'post' == get_post_type() ) : ?>

        <?php endif; ?>
    </header><!-- .entry-header -->
 
    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
   <!--<div class="entry-content">
        <?php the_excerpt(); ?>
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'diariorumbosur' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'diariorumbosur' ), 'after' => '</div>' ) ); ?>
    </div>-->
    <!-- .entry-content -->
    <?php endif; ?>
 
    <footer class="entry-meta">
        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Fch ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'diariorumbosur' ) );
                if ( $categories_list && diariorumbosur_categorized_blog() ) :
            ?>

            <?php endif; // End if categories ?>
 
            <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', __( ', ', 'diariorumbosur' ) );
                if ( $tags_list ) :
            ?>
            <!--<span class="sep"> | </span>-->
            <!--<span class="tag-links">
                <?php printf( __( 'Tagged %1$s', 'diariorumbosur' ), $tags_list ); ?>
            </span>-->
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>
 
        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
        <span class="sep"> | </span>
        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'diariorumbosur' ), __( '1 Comment', 'diariorumbosur' ), __( '% Comments', 'diariorumbosur' ) ); ?></span>
        <?php endif; ?>
 
        <!--<?php edit_post_link( __( 'Edit', 'diariorumbosur' ), '<span class="edit-link">', '</span>' ); ?>-->
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->