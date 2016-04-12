<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lighthouse
 */

?>

	</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-normal">
		<div class="container">
			<div class="row widget">
				<div class="col-sm-6 col-md-3 widget-col widget-col-1"><?php dynamic_sidebar( 'footer_widgets_1' ); ?></div>
				<div class="col-sm-6 col-md-3 widget-col widget-col-2"><?php dynamic_sidebar( 'footer_widgets_2' ); ?></div>
				<div class="col-sm-6 col-md-3 widget-col widget-col-3"><?php dynamic_sidebar( 'footer_widgets_3' ); ?></div>
				<div class="col-sm-6 col-md-3 widget-col widget-col-4"><?php dynamic_sidebar( 'footer_widgets_4' ); ?></div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row site-info">
				<div class="col-sm-12 col-md-6 bottom-footer-right">
					<div class="social-items">
						<!-- <a href="" class="link link-youtube" target="_blank"><i class="fa fw fa-youtube"></i></a> -->
						<a href="https://www.linkedin.com/company/lighthouse-group-plc" class="link link-linkedin" target="_blank"><i class="fa fw fa-linkedin"></i></a>
						<a href="https://plus.google.com/b/112602769566696286010/112602769566696286010/about/p/pub" class="link link-google-plus" target="_blank"><i class="fa fw fa-google-plus"></i></a>
						<a href="https://www.facebook.com/LighthouseGroupPLC" class="link link-facebook" target="_blank"><i class="fa fw fa-facebook"></i></a>
						<a href="https://twitter.com/talk2lighthouse" class="link link-twitter" target="_blank"><i class="fa fw fa-twitter"></i></a>
					</div>
					<div class="footer-menu">
						<?php lighthouse_footer_menu_bottom(); ?>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 bottom-footer-left">
					<div class="copyright">© 2016 - Lighthouse Financial Solutions</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- footer -->
</div><!-- #page -->

<!-- MENU FOR SMALL SCREEN -->

<button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button>
<nav id="mm-menu" class="mm-menu">
	<div class="mm-menu__header">
		<h2 class="mm-menu__title">Lighthouse</h2>
	</div>
	<?php lighthouse_header_menu_left(); ?>
	<?php lighthouse_header_menu_right(); ?>
</nav><!-- nav -->

<?php wp_footer(); ?>
<script type="text/javascript">
	function fixed_header_with_adminBar() {
		var adminBarHeight	= jQuery('#wpadminbar').height();
		var menuToggleTop 	= 55;
		var topTotal 		= adminBarHeight + menuToggleTop;
		jQuery('#masthead').css('top',adminBarHeight);
		jQuery('#mm-menu-toggle').css('top',topTotal)
	}
	fixed_header_with_adminBar();
	jQuery( window ).resize(function() {
		fixed_header_with_adminBar();
	});
</script>

<!-- Google Analytics tracking code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74121462-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>