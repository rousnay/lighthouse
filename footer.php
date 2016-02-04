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
						<!-- <a href="" class="icon icon-youtube" target="_blank"><i class="fa fw fa-youtube"></i></a> -->
						<a href="https://www.linkedin.com/company/lighthouse-financial-advice" class="icon icon-linkedin" target="_blank"><i class="fa fw fa-linkedin"></i></a>
						<a href="https://plus.google.com/b/112602769566696286010/112602769566696286010/about/p/pub" class="icon icon-google-plus" target="_blank"><i class="fa fw fa-google-plus"></i></a>
						<a href="https://www.facebook.com/Lighthouse-Group-1544255659197834/" class="icon icon-facebook" target="_blank"><i class="fa fw fa-facebook"></i></a>
						<a href="https://twitter.com/talk2lighthouse" class="icon icon-twitter" target="_blank"><i class="fa fw fa-twitter"></i></a>
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
		var menuToggleTop 	= 65;
		var topTotal 		= adminBarHeight + menuToggleTop;
		jQuery('#masthead').css('top',adminBarHeight);
		jQuery('#mm-menu-toggle').css('top',topTotal)
	}
	fixed_header_with_adminBar();
	jQuery( window ).resize(function() {
		fixed_header_with_adminBar();
	});
</script>


<?php if( !is_single() ) : ?>
	<!-- BEGIN LivePerson Monitor. -->
	  <script type="text/javascript"> window.lpTag=window.lpTag||{};if(typeof window.lpTag._tagCount==='undefined'){window.lpTag={site:'18438131'||'',section:lpTag.section||'',autoStart:lpTag.autoStart===false?false:true,ovr:lpTag.ovr||{},_v:'1.5.1',_tagCount:1,protocol:location.protocol,events:{bind:function(app,ev,fn){lpTag.defer(function(){lpTag.events.bind(app,ev,fn);},0);},trigger:function(app,ev,json){lpTag.defer(function(){lpTag.events.trigger(app,ev,json);},1);}},defer:function(fn,fnType){if(fnType==0){this._defB=this._defB||[];this._defB.push(fn);}else if(fnType==1){this._defT=this._defT||[];this._defT.push(fn);}else{this._defL=this._defL||[];this._defL.push(fn);}},load:function(src,chr,id){var t=this;setTimeout(function(){t._load(src,chr,id);},0);},_load:function(src,chr,id){var url=src;if(!src){url=this.protocol+'//'+((this.ovr&&this.ovr.domain)?this.ovr.domain:'lptag.liveperson.net')+'/tag/tag.js?site='+this.site;}var s=document.createElement('script');s.setAttribute('charset',chr?chr:'UTF-8');if(id){s.setAttribute('id',id);}s.setAttribute('src',url);document.getElementsByTagName('head').item(0).appendChild(s);},init:function(){this._timing=this._timing||{};this._timing.start=(new Date()).getTime();var that=this;if(window.attachEvent){window.attachEvent('onload',function(){that._domReady('domReady');});}else{window.addEventListener('DOMContentLoaded',function(){that._domReady('contReady');},false);window.addEventListener('load',function(){that._domReady('domReady');},false);}if(typeof(window._lptStop)=='undefined'){this.load();}},start:function(){this.autoStart=true;},_domReady:function(n){if(!this.isDom){this.isDom=true;this.events.trigger('LPT','DOM_READY',{t:n});}this._timing[n]=(new Date()).getTime();},vars:lpTag.vars||[],dbs:lpTag.dbs||[],ctn:lpTag.ctn||[],sdes:lpTag.sdes||[],ev:lpTag.ev||[]};lpTag.init();}else{window.lpTag._tagCount+=1;} </script>
	<!-- END LivePerson Monitor. -->
<?php endif; ?>

</body>
</html>