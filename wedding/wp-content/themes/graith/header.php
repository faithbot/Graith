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
				
				<div class="heading-container">
					
					<div class="heading-text">
						<h1>Greg and Faith</h1>
						<p class="banner-date">July 28, 2018</p>
					</div>
					
					<!-- countdown -->
					<div id="timer" class="timer">
						<div class="timer__section days">
							<div class="timer__number"></div>
							<div class="timer__label">days</div>
						</div>
						
						<div class="timer__section hours">
							<div class="timer__number"></div>
							<div class="timer__label">hours</div>
						</div>
						
						<div class="timer__section minutes">
							<div class="timer__number"></div>
							<div class="timer__label">Minutes</div>
						</div>

						<div class="timer__section seconds">
								<div class="timer__number"></div>
							<div class="timer__label">seconds</div>
						</div>

					</div>


				</div>
			</div>

				


		<?php } ?>
	</header>

	<!-- navigation -->
	<nav class="site-navigation">
		<?php wp_nav_menu( array( 'menu-1' => 'primary-menu' ) ); ?>
	</nav>

	<div id="content" class="site-content">
