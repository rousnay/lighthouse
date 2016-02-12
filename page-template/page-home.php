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

					<section class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="content-header">
									<h1>Book an Appointment</h1>
									<h4>Request a meeting in person or a telephone call with your local adviser.</h4>
								</div>
							</div>
						</div>
						<div class="row boxes">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-edit"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Auto Enrolment</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-key"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Mortgages</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-shield"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Life Insurance</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-document"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Pensions</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-bargraph"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Investments</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="box-link">
									<div class="box-holder">
										<div class="box-icon">
											<div class="icomoon icon-wallet"></div>
										</div>
										<div class="box-text">
											<h3 class="box-title">Wealth Management</h3> 
											<hr>
										</div>
									</div>
									<a class="box-link-holder" href="#">link</a>
								</div>
							</div>
						</div>
					</section>

					<section class="block-link">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="block-img shareholder-img">
									<div class="block-overlay"></div>
									<div class="block-holder">
										<div class="block-inner">
											<div class="block-text">
												<h3>I'm a Shareholder</h3>
											</div>
										</div>
									</div>
									<div class="block-holder-link">
										<div class="block-inner">
											<div class="block-text">
												<a href="#">View Investor Relations</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4">
								<div class="block-img adviser-img">
									<div class="block-overlay"></div>
									<div class="block-holder">
										<div class="block-inner">
											<div class="block-text">
												<h3>I'm an Adviser</h3>
											</div>
										</div>
									</div>
									<div class="block-holder-link">
										<div class="block-inner">
											<div class="block-text">
												<a href="#">Join Lighthouse</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4">
								<div class="block-img enrolment-img">
									<div class="block-overlay"></div>
									<div class="block-holder">
										<div class="block-inner">
											<div class="block-text">
												<h3>View Auto Enrolment</h3>
											</div>
										</div>
									</div>
									<div class="block-holder-link">
										<div class="block-inner">
											<div class="block-text">
												<a href="#">View Auto Enrolment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container member-logo">
							<div class="row">
								<div class="col-xs-12">
									<h4>Members of the following groups, see how we already work with you:</h4>

									<?php echo do_shortcode( '[members_logo]') ?>
								</div>
							</div>
						</div>

					</section>

					<section class="container recent-posts">
						<div class="row">
							<div class="col-xs-12">
								<div class="content-header">
									<h1>Lighthouse News Centre</h1>
									<p>Read the latest articles and commentary in our news blog:</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php echo do_shortcode( '[recent_posts]') ?>
							</div>
						</div>
					</section>

					<section class="get-touch">
						<div class="row">
							<div class="col-xs-12">
								<h1>Get Trusted, Expert Financial Advice</h1>
								<a href="http://genuineimitation.co.uk/lighthouse/get-advice-now/">
									<span class="tag-support">Get in Touch</span>
								</a>
							</div>
						</div>
					</section>

					<section class="about-link">
						<div class="row">
							<div class="col-xs-12 col-sm-6 about-advice">
								<div class="block-overlay"></div>
								<div class="about-block">
									<h1>Why seek Professional Advice?</h1>
									<p class="tag-support">With financial security comes peace of mind and the space to do the things we enjoy in life. Yet, wealth is fundamental in this equation. This is why you consider seeking professional financial advice.</p>
									<a href="http://genuineimitation.co.uk/lighthouse/get-advice-now/">
										<span class="tag-support">Benefits of Expert Advice</span>
									</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 about-lighthouse">
								<div class="block-overlay"></div>
								<div class="about-block">
									<h1>Who are Lighthouse</h1>
									<p class="tag-support">
										Lighthouse is one the UK’s most prestigious and diverse financial advice firms; profoundly interested in the security of your financial future and helping you make the most of your financial circumstances. </p>
										<a href="http://genuineimitation.co.uk/lighthouse/about-lighthouse/">
											<span class="tag-support">Find out more</span>
										</a>
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