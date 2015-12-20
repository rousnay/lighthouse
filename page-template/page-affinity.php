<?php
/**
 * Template Name: Affinity
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

<section class="profile-content load-fadeInUp">
	<?php the_content(); ?>
</section>

<section class="profile-tiasa">
	<img class="img-responsive load-fadeIn" src="<?php the_field('feature_image_above_tiasa_title'); ?>">
<div class="title-area">
		<h1 class="page-title">TIASA</h1>
	</div>
<div class="profile-text load-fadeInUp"><?php the_field('profile_tiasa'); ?></div>
</section>

<section class="profile-valhall">
	<img class="img-responsive load-fadeIn" src="<?php the_field('feature_image_above_valhall_tfs_title'); ?>">
<div class="title-area">
		<h1 class="page-title">VALHALL/TFS</h1>
	</div>
<div class="profile-text load-fadeInUp"><?php the_field('profile_valhall_tfs'); ?></div>
<a class="btn-link" href="<?php echo esc_url( home_url( '/' ) ); ?>court-booking/"><button class="site-btn load-fadeInUp">Book a Court</button></a>
</section>

<section class="profile-academy">
	<img class="img-responsive" src="<?php the_field('feature_image_above_the_academy_title'); ?>">
<div class="title-area">
		<h1 class="page-title">The Academy</h1>
	</div>
<div class="profile-text load-fadeInUp"><?php the_field('profile_academy'); ?></div>
<a class="btn-link" href="<?php echo esc_url( home_url( '/' ) ); ?>academy/"><button class="site-btn load-fadeInUp">Learn More</button></a>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>