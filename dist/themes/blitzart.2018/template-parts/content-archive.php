<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blitzart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-container grid-x align-middle'); ?>>
	<header class="entry-header medium-8 cell">
		<?php the_title( '<h1 class="entry-title">', '</h1>' );  ?>
	</header><!-- .entry-header -->

	
	<div class="gallery-container grid-x cell">
		<div class="medium-8 cell">
			<figure class="hero images">
				<?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
				<a href="<?php echo $featured_img_url; ?>" >
					<?php the_post_thumbnail('hero') ?>
				</a>
			</figure>
		</div>
		<div class="medium-4 cell grid-gallery-small gallery">
				<?php 
				$data = carbon_get_the_post_meta( 'media_gallery' ); 
				$i = 0;
				foreach ($data as $attachment_id) {
					$i++;
					echo '<a href="' . wp_get_attachment_image_url( $attachment_id, 'full', '' ) . '" class="items">';
					echo wp_get_attachment_image( $attachment_id, 'portrait', '', array( "class" => "item") );
					echo '</a>';
					if($i == '4') {
						break;
					}
				}
				?>
			</div>
	</div>					
	<footer class="entry-footer">
		<?php blitzart_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
