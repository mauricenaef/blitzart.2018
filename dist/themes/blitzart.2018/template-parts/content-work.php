<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blitzart
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-container grid-x grid-padding-y section-padding'); ?>>
	<section class="site-main medium-5 large-4 cell">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content();  ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php blitzart_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</section>			
	<aside class="medium-5 medium-offset-1 large-6 large-offset-2 cell">
		<figure class="hero images">
			<?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
			<a href="<?php echo $featured_img_url; ?>" >
				<?php the_post_thumbnail('hero') ?>
			</a>
		</figure>
		<div class="grid-gallery gallery">
			<?php 
			$data = carbon_get_the_post_meta( 'media_gallery' ); 
			foreach ($data as $attachment_id) {
				
				echo '<a href="' . wp_get_attachment_image_url( $attachment_id, 'full', '' ) . '">';
				echo wp_get_attachment_image( $attachment_id, 'portrait', '', array( "class" => "item") );
				echo '</a>';
			}
			?>
		</div>
	</aside>
</article><!-- #post-<?php the_ID(); ?> -->