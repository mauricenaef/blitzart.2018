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
				<svg class="logo-bird" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{fill:#003554;}</style></defs><title>animate</title><g id="A"><path id="Fill-9" class="bird cls-1" d="M421.35,170a72.15,72.15,0,0,1,4.9,22.12c1.64,25.52-9.07,54.68-32.5,81.36s-86.65,69.94-119,79.38c6.56,29.12,5.23,42.09-.68,45.35,6.21,17.49,12.91,22,34.19,36.57-15.15,4.13-23.7-6.39-33.32-6.39-13.78-1.38-21.75,9.14-35.5,6.39,19.43-12.56,31.28-16.59,31.57-35.74-17.86,1-60.4-50.92-78.06-59.3-25.93-12.28-72.15-41-124.86-52.91s-89.86-20.93-53.68-22.31c40.87-1.58,98.33-25.81,156.29-53.3a7.67,7.67,0,0,0-3.54-2.89c-8.28-6.18-26.85,4.13-37.19,0-24.78-12.38-6.18-33-24.78-43.37,31.88,11,64.22,12.31,96.58,12.86a66.63,66.63,0,0,1-16.21-14.07c-1.8-1,3.46-14.63-.92-19.45-4.18-9.44-25.47-9.51-32.47-18.16-15.56-22.9,10.74-31.85-.44-49.94,34.51,38.59,81.1,58,122.67,85.11,49.77-22.94,91.1-38.11,110.27-29a82,82,0,0,1,14.63,8.86c3.85-19.17,11.61-39.06,16.33-57.94,2.75,16.52-1.38,42.68,6.88,56.45,13.77,23.4,61.95,9.62,89.49,20.65C489.48,161.29,447.8,174,421.35,170ZM388,154.78c-29.65-24-44.25,43.23-5.94,36.8Q411.42,187.25,388,154.78Zm-12.9,3c12.24,0,12.22,19,0,19S362.92,157.8,375.11,157.8Z"/></g></svg>
				<a href="https://mauricenaef.ch" rel="noreferrer" class="credits-logo" title="Webdesign by mauricenaef.ch" target="_blank"><img src="https://mauricenaef.ch/externaldata/logo_icon.svg" width="24" height="24" title="Web Design by MAURICE NAEF webdesign" alt="Web Design by MAURICE NAEF webdesign" /></a>
			</div>
		</div>
	</footer>
	<?php if (is_front_page()) { ?>
	<div id="loader">
		<div class="loader"></div>
		<svg id="bird" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 568"><defs><style>.cls-1{fill:#003554;fill-rule:evenodd;}</style></defs><title>A</title><path class="cls-1 bird" d="M411,270.56c-11.83,0-11.81-18.37,0-18.37S422.82,270.56,411,270.56Zm18.65,13.22c28.36-4.54,17.92-46.44-11.1-39.64C384.37,251.91,403.87,287.91,429.64,283.78Zm-290.7,49c2.27-11.88,11.12-27.36,12.93-33.2a32.25,32.25,0,0,1-15.36-.58c1.05-22.6,19-43.12,35.87-55.21-9,3.2-20.28,8.24-30.59,4.85,5.19-10.94,13.64-24.05,23.13-31.48a43.9,43.9,0,0,1,11.41-6.48c-1,.18-2.09.39-3.17.64l-2.39-1.84c-6.06,2.95-18.4,3.73-22.24-2.63-7.38-13.62,28.25-26.49,36.13-31.82A32.32,32.32,0,0,1,173,165c14.93-17,41.76-21.83,62.5-20.71-9-3.1-21-6.24-26.92-15.32,10.89-5.3,25.67-10.26,37.71-10.14,20.15-.1,38.33,17.24,56.69,16.53-10.89-23.88,15.69-4.65,22.23,2.63,10.7,12.75,18.08,26.36,25.15,40.88,8.12,16.66,12.44,33.51,15.07,51.9,31.81-12.72,57.27-19.06,71-12.54a78.85,78.85,0,0,1,14.15,8.57c3.73-18.54,11.23-37.79,15.8-56.06,2.66,16-1.34,41.29,6.65,54.61,13.32,22.64,59.94,9.32,86.57,20-21.77.9-62.09,13.16-87.69,9.36a69.59,69.59,0,0,1,4.74,21.39c1.59,24.71-8.76,52.91-31.43,78.72s-51.54,53.32-91.54,67.83A138.07,138.07,0,0,1,278.52,428c-8.3,4.12-34.29,16.74-45.21,18.92-13.07,2.62-22.83,4-29.48-2.38S200,426.72,200,426.72s15.61,10.79,16.18,11.11c13.5,7.67-32.09,6.33,17.11,2.93,5.21-.36,23.74-10.88,32.54-16a115.78,115.78,0,0,1-13.07-5c-5.92,2.64-11.84,4.92-16.24,5.79-13.08,2.62-22.83,4.05-29.48-2.38s-3.81-17.84-3.81-17.84,15.61,10.78,16.17,11.11c13.51,7.66-32.09,6.33,17.12,2.93,2-.14,5.35-1.37,9.1-3.05-25.81-13-67.92-37.88-115.47-48.57-51-11.45-86.95-20.27-51.95-21.62C95.76,345.47,116.45,340.48,138.94,332.82Z"/></svg>
	</div>
	<?php } ?>
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