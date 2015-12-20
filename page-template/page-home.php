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
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lighthouse' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">



			<?php
/****************************
 * HEADER END
 ****************************/
?>


<?php while ( have_posts() ) : the_post(); ?>

	<?php if( have_rows('main_slider') ): ?>
		<section class="home-row home-row-slider load-fadeIn">
			<div id="main-slider">
				<ul class="bjqs">
					<?php while( have_rows('main_slider') ): the_row(); 
					$name = get_sub_field('name');
					$caption = get_sub_field('caption');
					$slide_image = get_sub_field('slide_image');
					$background_color = get_sub_field('background_color');
					?>
					<li class="slider-item" style="background-image:url('<?php echo $slide_image; ?>'); background-color:<?php echo $background_color; ?>">
						<img src="<?php echo $slide_image;?>">
						<div class="slider-info">
							<div class="slider-name"><?php echo $name; ?></div>
							<div class="slider-caption"><?php echo $caption; ?></div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="open-booking-popup"><button class="btn-open">BOOK A COURT</button></div>
		<div id="booking-popup">
			<div class="popup-nav">
				<div class="nav-court nav-court1 active-court">
					<h1 class="page-title">Court 1</h1>
				</div>
				<div class="nav-court nav-court2">
					<h1 class="page-title">Court 2</h1>
				</div>
			</div>
			<div class="popup-courts">
				<div class="popup-court1">
					<?php echo do_shortcode('[product_page id="133"]'); ?>
				</div>
				<div class="popup-court2">
					<?php echo do_shortcode('[product_page id="151"]'); ?>
				</div>
				<div class="b-close"><button class="btn-close">CLOSE WINDOW</button></div>

			</div>
		</div>
	</section>
<?php endif; ?>

<section class="home-row home-row-content">
	<?php the_content(); ?>
</section>
<section class="home-row home-row-tiasa">
	<div class="title-area">
		<h1 class="page-title">TIASA Floorball</h1>
	</div>
	<div class="home-subtitle load-fadeIn"><?php the_field('tiasa_floorball'); ?></div>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>profile/"><button class="site-btn load-fadeIn">Learn More</button></a>
</section>

<section class="home-row home-row-academy load-fadeInUp" style="background-image:url('<?php the_field('feature_image_academy'); ?>'); background-color:<?php the_field('academy_background_color'); ?>">
	<div class="title-area">
		<h1 class="page-title">The Academy</h1>
	</div>
	<div class="home-subtitle load-fadeIn"><?php the_field('the_academy'); ?></div>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>academy/"><button class="site-btn load-fadeIn">Learn More</button></a>
</section>

<section class="home-row home-row-shop load-fadeInUp" style="background-image:url('<?php the_field('feature_image_shop'); ?>'); background-color:<?php the_field('shop_background_color'); ?>">
	<div class="title-area">
		<h1 class="page-title">The Shop</h1>
	</div>
	<div class="home-subtitle load-fadeIn"><?php the_field('the_shop'); ?></div>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>the-shop/"><button class="site-btn load-fadeIn">Learn More</button></a>
</section>

<section class="home-row home-row-blog">
	<div class="row home-blog">
		<?php global $post;
		$coverPost = get_posts('numberposts=1&category=11');
		foreach($coverPost as $post) :
			setup_postdata($post);
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing-home');
		$url = $thumb[0];?>
		<div class="home-blog-cat home-product col-xs-12 col-sm-6 load-fadeInLeft" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
			<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
			<div class="title-area">
				<h2 class="post-title">Products</h2>
			</div>
		</div>

		<a href="<?php the_permalink(); ?>">
			<div class="home-blog-info col-xs-12 col-sm-6 load-fadeInRight">
				<?php the_title(); ?> <br>
				<span class="post-date"><?php the_time(get_option('date_format')) ?></span>
			</div>
		</a> 
	<?php endforeach; ?>
</div>


<div class="row home-blog">
	<?php global $post;
	$coverPost = get_posts('numberposts=1&category=9');
	foreach($coverPost as $post) :
		setup_postdata($post);
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing-home');
	$url = $thumb[0];?>
	<a href="<?php the_permalink(); ?>">
		<div class="home-blog-info col-xs-12 col-sm-6 load-fadeInLeft">
			<?php the_title(); ?> <br>
			<span class="post-date"><?php the_time(get_option('date_format')) ?></span>
		</div>
	</a>

	<div class="home-blog-cat home-events col-xs-12 col-sm-6 load-fadeInRight" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
		<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
		<div class="title-area">
			<h2 class="post-title">Events</h2>
		</div>
	</div>
<?php endforeach; ?>
</div>

<div class="row home-blog">
	<?php global $post;
	$coverPost = get_posts('numberposts=1&category=12');
	foreach($coverPost as $post) :
		setup_postdata($post);
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing-home');
	$url = $thumb[0];?>
	<div class="home-blog-cat home-talents col-xs-12 col-sm-6 load-fadeInLeft" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
		<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
		<div class="title-area">
			<h2 class="post-title">Talents</h2>
		</div>
	</div>

	<a href="<?php the_permalink(); ?>">
		<div class="home-blog-info col-xs-12 col-sm-6 load-fadeInRight">
			<?php the_title(); ?> <br>
			<span class="post-date"><?php the_time(get_option('date_format')) ?></span>
		</div>
	</a> 
<?php endforeach; ?>

</div>

<div class="row home-blog">
	<?php global $post;
	$coverPost = get_posts('numberposts=1&category=10');
	foreach($coverPost as $post) :
		setup_postdata($post);
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing-home');
	$url = $thumb[0];?>

	<a href="<?php the_permalink(); ?>">
		<div class="home-blog-info col-xs-12 col-sm-6 load-fadeInLeft">
			<?php the_title(); ?> <br>
			<span class="post-date"><?php the_time(get_option('date_format')) ?></span>
		</div>
	</a>

	<div class="home-blog-cat home-workshops col-xs-12 col-sm-6 load-fadeInRight" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
		<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
		<div class="title-area">
			<h2 class="post-title">Workshops</h2>
		</div>
	</div>
<?php endforeach; ?>
</div>

<div class="row home-blog">
	<?php global $post;
	$coverPost = get_posts('numberposts=1&category=13');
	foreach($coverPost as $post) :
		setup_postdata($post);
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing-home');
	$url = $thumb[0];?>
	<div class="home-blog-cat home-tutorials col-xs-12 col-sm-6 load-fadeInLeft" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
		<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
		<div class="title-area">
			<h2 class="post-title">Tutorials</h2>
		</div>
	</div>
	<a href="<?php the_permalink(); ?>">
		<div class="home-blog-info col-xs-12 col-sm-6 load-fadeInRight">
			<?php the_title(); ?> <br>
			<span class="post-date"><?php the_time(get_option('date_format')) ?></span>
		</div>
	</a> 
<?php endforeach; ?>

</div>
</section>
<?php endwhile; // end of the loop. ?>



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

<?php wp_footer(); ?>

</body>
</html>
