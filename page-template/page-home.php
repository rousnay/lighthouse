<?php
/**
 * Template Name: Home Page
 *
 * @package Lighthouse
 */
get_header(); ?>

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

<?php get_footer(); ?>