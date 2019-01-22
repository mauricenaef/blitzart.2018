<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blitzart
 */

?>
	</div>
	<footer id="colophon" class="site-footer">
		<div class="grid-container grid-x align-top">
			<div class="cell"><h3 class="header-title">Kontakt</h3></div>
			<div class="small-6 medium-3 cell">
				<p>blitzartgrafik<br />Steinberggasse 54 <br/>8400 Winterthur</p>
				<p><a href="tel:+41 76 343 72 23">+41 76 343 72 23</a><br /><a href="mailto:info@blitzart.ch">info@blitzart.ch</a></p>
				<p class="copyright">© <?php bloginfo( 'name' ); ?> | 2004 - <?php echo date('Y'); ?></p>
			</div>
			<div class="small-6 medium-3 cell">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ,'menu_class' => 'menu vertical')); ?>
			</div>
			<div class="medium-2 medium-offset-4">
				<a href="#top" class="cell go-back"><?php svg_icon('arrow_up'); ?> Nach oben</a>
			</div>
		</div>
	</footer>
	<canvas id="c"></canvas>
<?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-580778-56"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-580778-56');
</script>

</body>
</html>