<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package diariorumbosur
 * @since diariorumbosur 1.0
 */
?><!DOCTYPE html>

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;
 
wp_title( '|', true, 'right' );
 
// Add the blog name.
bloginfo( 'name' );
 
// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";
 
// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'diariorumbosur' ), max( $paged, $page ) );
 
?></title>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="pre-header">
			<div class="fecha"><?php setlocale(LC_TIME, 'es_ES');    
				echo ucwords (strftime('%A'));
				echo strftime (' %d de %B de %Y'); ?>
			</div>
			<div class="tiempo">
    			<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div>			
			<div class="social">
				<a href="http://www.facebook.com/diariorumbosur" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></a>
				<a href="http://www.twitter.com/diariorumbosur" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></a>
				<a href="mailto:contactolectores@diariorumbosur.com.ar" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/email.png"></a>

			</div>	
		</div>
		<div class="header">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            		<img src="<?php echo get_bloginfo('template_directory');?>/img/diario-rumbo-sur-logo.png">
            	</a>
			</div>
			<nav role="navigation" class="site-navigation main-navigation">
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
 			</nav><!-- .site-navigation .main-navigation -->
		</div>			
	</header>

	</div>

	<div id="main" class="site-main">