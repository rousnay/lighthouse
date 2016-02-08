<?php
/**
 * Template Name: Home
 *
 * @package Lighthouse
 */
get_header(); ?>

<div class="container">
	<div class="row">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="sections">
					<?php //the_content(); ?>


<section class="slider">
<div class="row">
<div class="col-xs-12">
<div class="slider-inner">
<?php echo do_shortcode( '[masterslider id="1"]') ?>
</div>
<div class="messages">
<p>Latest Financial Reports just added - View our 2016 Accounts here +</p>
</div>
</div>
</div>
</section>

<section class="container main-content">
<div class="row">
<div class="col-xs-12">
<div class="content-header">
<h1>Book an Appointment</h1>
Request a meeting in person or a telephone call with your local adviser.
</div>
</div>
</div>
<div class="row">
<div class="col-sm-9 col-md-offset-1 col-md-5">[ninja_forms id=12]</div>
<div class="col-sm-3 col-md-5">
<div class="content-text">
<img class="content-img" src="http://genuineimitation.co.uk/lighthouse/wp-content/uploads/2016/01/adviser_appointment.jpg" alt="" />
<h3>To book an appointment please take a moment to complete the form so we can select the most appropriate adviser for you.</h3>
When we receive the form a member of our Client Services team will contact you to schedule your initial consultation. Before embarking on any detailed research and making recommendations our advisers will always disclose and agree with you any fees to be charged for such work.
</div>
</div>
</div>
</section>






















				</div>
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>