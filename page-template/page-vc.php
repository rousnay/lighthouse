<?php
/**
 * Template Name: Template with Visual Editor
 *
 * @package Lighthouse
 */
get_header(); ?>

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

<?php get_footer(); ?>