<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lighthouse
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lighthouse' ); ?></a>

		<header id="masthead" class="site-header panel-top panel-fixed" role="banner">
			<div class="container">
				<div class="row social-links">
					<div class="col-sm-12 col-xs-12 col-md-6 social-items">
						<!-- <a href="" class="link link-youtube" target="_blank"><i class="fa fw fa-youtube"></i></a> -->
						<a href="https://www.linkedin.com/company/lighthouse-group-plc" class="link link-linkedin" target="_blank"></a>

						<a href="https://plus.google.com/b/112602769566696286010/112602769566696286010/about/p/pub" class="link link-google-plus" target="_blank"></a>

						<a href="https://www.facebook.com/LighthouseGroupPLC" class="link link-facebook" target="_blank"></a>

						<a href="https://twitter.com/talk2lighthouse" class="link link-twitter" target="_blank"></a>


						<a href="#" class="live-feed hidden-xs hidden-sm">
							<span class="share-price-at-top">
								<?php
									$xmldat = file_get_contents('http://qfx.quartalflife.com/clients/uk/lighthouse_group/xml/xml.aspx');

									file_put_contents('./wp-content/themes/lighthouse/xml-feeds/share-price.xml', $xmldat);

									$url 	= './wp-content/themes/lighthouse/xml-feeds/share-price.xml';
									$xml 	= simplexml_load_file($url);
									$price 	= $xml->CurrentPrice;
									$change = $xml->Change;
									$change_pcent 	= $xml->PercentageChange;
									$volume = $xml->Volume;

									echo "Share Price: ";
									echo $price;
									echo "p | Change: ";
									echo $change;
									echo "p - ";
									echo $change_pcent;
									echo "% | Volume: ";
									echo $volume;
								?>
							</span>
						</a>
					</div>
					<div class="col-md-6 top-search hidden-xs hidden-sm">
						<div class="font-adjustment">
							<button id="textplus">A+</button>
							<button id="textminus">A-</button>
						</div>
						<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						    <div class="search-wrap">
						    	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'presentation' ); ?></label>
						    	 <button type="submit">
					                <i class="fa fa-search"></i>
					            </button>
						        <input type="search" placeholder="<?php echo esc_attr( 'Search', 'presentation' ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
						    </div>
						</form>
					</div>
				</div>
				<div class="row header-menus">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<div class="col-md-4 col-lg-4 hidden-xs hidden-sm menu-area">
							<div id="menu-left">
								<?php lighthouse_header_menu_left(); ?>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 header-center-area">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
							</a>

							<div class="iv-module live-search">
								<div class="centered">
									<a href="#" class="trigger"><i class="fa fa-search"></i></a>
									<div class="inner-wrapper">
										<span class="form-close-btn thin"> ✕ </span>
										<span class="form-close-btn bold"><i class="fa fa-remove"></i></span>
										<div class="inner-form">
											<div class="container">
												<div class="row">
													<div class="col-md-12">
														<form method="get" action="<?php echo esc_url( home_url( '/' ) );?>">
															<label for="s"><?php _e('Type &amp; hit enter to search', 'ivan_domain');?></label>
															<input type="search" name="s" id="s" placeholder="<?php echo esc_attr__('Type &amp; hit enter to search', 'lighthouse');?>" />
															<a class="submit-form" href="#"><i class="fa fa-search"></i></a>
															<div class="clearfix"></div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-4 col-lg-4 hidden-xs hidden-sm menu-area">
							<div id="menu-right">
								<?php lighthouse_header_menu_right(); ?>
							</div>
							<div class="iv-module live-search ">
								<div class="centered">
									<a href="#" class="trigger"><i class="fa fa-search"></i></a>
									<div class="inner-wrapper">
										<span class="form-close-btn thin"> ✕ </span>
										<span class="form-close-btn bold"><i class="fa fa-remove"></i></span>
										<div class="inner-form">
											<div class="container">
												<div class="row">
													<div class="col-md-12">
														<form method="get" action="<?php echo esc_url( home_url( '/' ) );?>">
															<label for="s"><?php _e('Type &amp; hit enter', 'ivan_domain');?></label>
															<input type="search" name="s" id="s" placeholder="<?php echo esc_attr__('Type &amp; hit enter', 'lighthouse');?>" />
															<a class="submit-form" href="#"><i class="fa fa-search"></i></a>
															<div class="clearfix"></div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">