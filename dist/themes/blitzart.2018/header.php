<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blitzart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<meta name="author" content="MAURICE NAEF webdesign" />
	<meta name="Copyright" content="Copyright <?php echo date('Y') ?>, alle Rechte vorbehalten | Konzept, Design und Umsetzung von MAURICE NAEF webdesign, https://mauricenaef.ch" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>

	<a class="skip-link show-for-sr" href="#content"><?php esc_html_e( 'Skip to content', 'blitzart' ); ?></a>

	<header class="site-header" role="banner" id="top">
		<div class="grid-container grid-x grid-padding-y align-bottom">
			<div class="site-branding small-5 medium-2 cell">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home">
					<?php the_custom_logo(); ?>
				</a>
			</div><!-- .site-branding -->
			<div class="auto cell">
				<nav id="site-navigation" class="site-nav">
					<?php
						wp_nav_menu( array(
							'menu_class'     => 'main-nav menu',
							'theme_location' => 'primary',
						) );
					?>
				</nav>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">