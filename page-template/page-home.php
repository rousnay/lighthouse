<?php
/**
 * Template Name: Home
 *
 * @package Lighthouse
 */
get_header(); ?>

<div class="container full-width">
	<div class="row">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="sections">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>