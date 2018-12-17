<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blitzart
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<meta name="author" content="MAURICE NAEF webdesign" />
	<meta name="Copyright" content="Copyright <?php echo date('Y') ?>, alle Rechte vorbehalten | Konzept, Design und Umsetzung von MAURICE NAEF webdesign, http://mauricenaef.ch" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>
	<div class="grid-container grid-x align-center align-middle" style="height: 100vh">
		<div class="cell">
			<img src="<?php bloginfo( 'template_url' ) ?>/images/logo.svg" alt="logo">
		</div>
	</div>
</body>
</html>
