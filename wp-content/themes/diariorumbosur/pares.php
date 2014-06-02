
<?php
/**
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="cat par">	
		<?php
		$category = get_the_category(); 
		echo $category[0]->cat_name;
		?>
	</div>
	    <h1 class="entry-title">
	    	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', 'diariorumbosur' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
	    		<div class="bloque">
		    		<?php the_title(); ?>
		    		<span>
		    			<?php if($post->post_excerpt) the_excerpt(); ?>
					</span>
				</div>	
	        </a>
	    </h1>
</article></div><!-- #post-<?php the_ID(); ?> -->



