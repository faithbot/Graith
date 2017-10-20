<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Graith
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<!-- banner pulled from featured image -->
		<?php 
			$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
			if( is_front_page() ) { ?>

			<div class="header-image" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
				
			</div>

		<?php } ?>
	</header>

	<!-- navigation -->
	<nav class="site-navigation">
		<?php wp_nav_menu( array( 'menu-1' => 'primary-menu' ) ); ?>
	</nav>

	<div id="content" class="site-content">
