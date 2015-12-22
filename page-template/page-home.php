<?php
/**
 * Template Name: Home
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

		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<div class="row social-links">
					<div class="col-lg-12 social-items">
						<a href="" class="icon icon-youtube" target="_blank"><i class="fa fw fa-youtube"></i></a>
						<a href="" class="icon icon-linkedin" target="_blank"><i class="fa fw fa-linkedin"></i></a>
						<a href="" class="icon icon-google-plus" target="_blank"><i class="fa fw fa-google-plus"></i></a>
						<a href="" class="icon icon-facebook" target="_blank"><i class="fa fw fa-facebook"></i></a>
						<a href="" class="icon icon-twitter" target="_blank"><i class="fa fw fa-twitter"></i></a>	
					</div>
				</div>
				<div class="row header-menus">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<div class="col-md-5 col-lg-5 hidden-xs hidden-sm menu-area">
							<div id="menu-left">
								<?php lighthouse_header_menu_left(); ?>
				        	</div>
						</div>
						<div class="col-sm-12 col-md-2 col-lg-2 header-center-area">
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
						<div class="col-md-5 col-lg-5 hidden-xs hidden-sm menu-area">
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



			<?php
/****************************
 * HEADER END
 ****************************/
?>
			<div class="container">
				<div class="row">
					<main id="main" class="site-main" role="main">
						<?php while ( have_posts() ) : the_post(); ?>
							<section class="home-content">
								<?php the_content(); ?>
							</section>
						<?php endwhile; // end of the loop. ?>
					</main><!-- #main -->
				</div><!-- .row -->
			</div><!-- .container -->
<?php
/****************************
 * PAGE TEMPLATE END
 ****************************/
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lighthouse' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'lighthouse' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lighthouse' ), 'lighthouse', '<a href="http://injectedmotion.com" rel="designer">Injected Motion</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

<button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button>
<nav id="mm-menu" class="mm-menu">
  <div class="mm-menu__header">
    <h2 class="mm-menu__title">Lighthouse</h2>
  </div>
  <ul class="mm-menu__items">
    <li class="mm-menu__item">
      <a class="mm-menu__link" href="#">
        <span class="mm-menu__link-text"><i class="md md-home"></i> Home</span>
      </a>
    </li>
    <li class="mm-menu__item">
      <a class="mm-menu__link" href="#">
        <span class="mm-menu__link-text"><i class="md md-person"></i> Profile</span>
      </a>
    </li>
    <li class="mm-menu__item">
      <a class="mm-menu__link" href="#">
        <span class="mm-menu__link-text"><i class="md md-inbox"></i> Inbox</span>
      </a>
    </li>
    <li class="mm-menu__item">
      <a class="mm-menu__link" href="#">
        <span class="mm-menu__link-text"><i class="md md-favorite"></i> Favourites</span>
      </a>
    </li>
    <li class="mm-menu__item">
      <a class="mm-menu__link" href="#">
        <span class="mm-menu__link-text"><i class="md md-settings"></i> Settings</span>
      </a>
    </li>
  </ul>
</nav><!-- /nav -->

<?php wp_footer(); ?>
</body>
</html>
