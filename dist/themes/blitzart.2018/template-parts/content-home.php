<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blitzart
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x align-middle'); ?>>
	<div class="entry-content cell medium-7">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<figure class="entry-thumbnail cell medium-5">
		<?php the_post_thumbnail( 'portrait_large' ) ?>
	</figure>
	
</article><!-- #post-<?php the_ID(); ?> -->
