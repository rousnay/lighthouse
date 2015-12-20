<?php
/**
 * Template Name: Contact
 *
 * @package Lighthouse
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="load-pulse" id="map-canvas"> </div>

		<div class="title-area">
			<h1 class="page-title">Contact Us</h1>
		</div>
		<div class="contact-info load-fadeIn">
		<?php the_content(); ?>	
		</div>
<h4 class="follow-title load-fadeIn">follow us on</h4>
<ul class="follow-us load-flipInX">
	<li><a href="<?php the_field('facebook'); ?>">Facebook</a></li>
	<li><a href="<?php the_field('twitter'); ?>">Twitter</a></li>
	<li><a href="<?php the_field('google_plus'); ?>">Google Plus</a></li>
	<li><a href="<?php the_field('youtube'); ?>">Youtube</a></li>
</ul>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>