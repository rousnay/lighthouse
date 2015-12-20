<?php
/**
 * Template Name: Service
 *
 * @package Lighthouse
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); 	
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
$url = $thumb[0];?>

<section class="header-area" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('page_background_color'); ?>">
	<img class="img-responsive" src="<?php echo $url; ?>" style="visibility:hidden">
	<div class="header-text">
	<div class="title-area">
		<h1 class="page-title"><?php echo get_the_title(); ?></h1>
	</div>
		<h3><?php the_field('sub-title'); ?></h3>
	</div>
</section>

<section class="floor">
	<div class="title-area">
		<h1 class="page-title">Floor Everyone</h1>
	</div>
	<div class="floor-text load-fadeIn"><?php the_field('floor_everyone'); ?></div>
	<a class="btn-link" href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/"><button class="site-btn load-fadeInUp">Contact Us</button></a>
</section>

<section class="academy-latest-post">
	<div class="jcarousel-wrapper">
		<div class="jcarousel">
			<ul>
<?php query_posts('cat=10&posts_per_page=3'); ?>
<?php while (have_posts()) : the_post(); ?>
<li class="blog-item shop-latest-item">
        <a href="<?php the_permalink() ?>" title="<?php  the_title_attribute() ?>">
          <?php
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing');
          $url = $thumb[0];
          ?>
        <div class="thumbnail blog-item-img" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
          <img class="img-responsive" src="<?php echo $url; ?>">
        </div>
        <div class="blog-post-info">
        <h3><?php the_title() ?></h3>
        <h6><?php the_time(get_option('date_format')) ?></h6>
        </div>
        </a>
</li>
<?php endwhile; ?>
<?wp_reset_query(); ?>

<?php query_posts('cat=13&posts_per_page=3'); ?>
<?php while (have_posts()) : the_post(); ?>
<li class="blog-item shop-latest-item">
        <a href="<?php the_permalink() ?>" title="<?php  the_title_attribute() ?>">
          <?php
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-listing');
          $url = $thumb[0];
          ?>
        <div class="thumbnail blog-item-img" style="background-image:url('<?php echo $url; ?>'); background-color:<?php the_field('post_background_color'); ?>">
          <img class="img-responsive" src="<?php echo $url; ?>">
        </div>
        <div class="blog-post-info">
        <h3><?php the_title() ?></h3>
        <h6><?php the_time(get_option('date_format')) ?></h6>
        </div>
        </a>
</li>
<?php endwhile; ?>
<?wp_reset_query(); ?>

			</ul>
		</div>

		<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
		<a href="#" class="jcarousel-control-next">&rsaquo;</a>
	</div>
</section>

<a class="product-post-link" href="#"><div class="product-cat">read more workshops and tutorials blog posts</div></a>

<section class="coaches">
	<div class="title-area">
		<h1 class="page-title">Coaches</h1>
	</div>
	<div class="coaches-text load-fadeInUp"><?php the_field('about_coaches'); ?></div>
	<img class="img-responsive load-fadeIn" src="<?php the_field('feature_image_above_coach_list'); ?>">
</section>

<?php if( have_rows('coach_list') ): ?>
	<section class="coach-list">
		<ul class="coach_list">
			<?php while( have_rows('main_coaches') ): the_row(); 
			$coach_name = get_sub_field('coach_name');
			$coach_photo = get_sub_field('coach_photo');
			$coach_biography = get_sub_field('coach_biography');
			?>

			<li class="coach main-coach load-fadeInUp">
				<img class="img-responsive" src="<?php echo $coach_photo; ?>">
				<!-- 			<div class="coach-info"></div> -->
				<div class="title-area">
		 			<h1 class="page-title"><?php echo $coach_name; ?></h1>
		 		</div>
				<div class="coach-biography"><?php echo $coach_biography; ?></div>
			</li>
		<?php endwhile; ?>
		</ul>
		<ul id="other-coach-box" class="coach_list">
		<?php while( have_rows('coach_list') ): the_row(); 
		$coach_name = get_sub_field('coach_name');
		$coach_photo = get_sub_field('coach_photo');
		$coach_biography = get_sub_field('coach_biography');
		?>
		<li class="coach other-coach load-slideInUp">
		<h1 class="page-title"><?php echo $coach_name; ?></h1>
		<div>
			<img class=".ui-accordion .ui-accordion-content img-responsive" src="<?php echo $coach_photo; ?>">
			<div class=".ui-accordion .ui-accordion-content coach-biography"><?php echo $coach_biography; ?></div>
        </div>
		</li>
	<?php endwhile; ?>
		</ul>
</section>
<?php endif; ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>