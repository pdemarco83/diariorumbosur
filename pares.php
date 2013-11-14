
<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="pares">
    <h1 class="entry-title">
    	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
    		<?php the_title(); ?>
    		<span>
                <?php echo $excerpt = get_the_excerpt() ?>

			</span></a></h1>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->



