<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blitzart
 */

get_header(); ?>

	<div id="primary" class="grid-container grid-x section-padding">
		<a href="#" onclick="goBack()" class="cell go-back"><?php svg_icon('arrow_left'); ?> Übersicht</a>
		<main id="main" class="site-main medium-4 cell">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<aside class="medium-8 cell">
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
		<?php //get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_footer();
