<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package derek-rickert
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>

<?php if ( is_home() ) : ?>
  <script type="text/javascript">
  jQuery(function($){
  	$.supersized({
  		slide_interval: 3000,
  		transition: 1,
  		transition_speed: 700,
  		slide_links: 'blank',
  		slides:  	[
  		<?php 
  		  query_posts( array ('post_type'=>'slides', 'posts_per_page'=>'10' ) );
      
        if ( have_posts()) : 
          while ( have_posts()) : the_post();
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $title = get_the_title();

            echo "{image : '" . $large_image_url[0]."', title : '" . $title . "', url : ''},";
          endwhile; 
        endif; 
      ?>]		
  	});
  });
  </script>
<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<div class="social">
			  <a href="http://facebook.com/spectralproduction" target="_blank"><i class="icon-facebook"></i></a>
			  <a href="http://twitter.com/Spec_Production" target="_blank"><i class="icon-twitter"></i></a>
			  <a href="http://youtube.com/user/SpectralProduction" target="_blank"><i class="icon-youtube"></i></a>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
  
	<div id="content" class="site-content">
