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
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class=""><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		 ?>
	</header><!-- .entry-header -->

	<div class="entry-content medium-8 cell">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Weiter lesen<span class="show-for-sr"> "%s"</span>', 'blitzart' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		?>
	</div><!-- .entry-content -->
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
					if($i == '3') {
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
