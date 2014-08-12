<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="detapa">
    <div class="cat tap">  
    <?php
$category = get_the_category(); 
echo $category[0]->cat_name;
?>
    </div>

    <a class="pic" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
    <?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>
    <div class="vcontainer"><?php the_field('video'); ?></div>
    </a>

    <h1 class="entry-title">
    	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
    		<?php the_title(); ?>
    		<span>
    			<?php if($post->post_excerpt) the_excerpt(); ?>
			</span></a></h1>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->