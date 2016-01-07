<?php
/**
 * Template Name: Blog
 *
 * @package Lighthouse
 */
get_header(); ?>
<div class="title-wrapper">
	<div class="container">
		<div class="row">
		<div class="col-xs-12">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<h3 class="sub-title">Read the latest articles, commentary in our news blogs</h3>
		</div>
		</div>
	</div>
</div>
<div class="container blog-wrapper">
	<div class="row">
		<div class="col-md-9 blog-listing">
			<?php 
			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			$postid = get_the_ID();
			while ( $loop->have_posts() ) : $loop->the_post();?>



			<article id="post-<?php echo $postid; ?>">
				<div class="row blog-item">
					<?php
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lighthouse_blog_listing');
					$url = $thumb[0];
					?>
					<div class="col-sm-6 col-md-7 blog-thumb">
						<div class="thumbnail thumbnail-hover">
							<div class="blog-img" style="background-image:url('<?php echo $url; ?>');?>">
							<img class="img-responsive" style="visibility:hidden" src="<?php echo $url; ?>">
							</div>
							<a href="<?php the_permalink() ?>" title="<?php  the_title_attribute() ?>" class="overlay"></a>
							<span class="thumb-cross"></span>
						</div>

					</div>
					<div class="col-sm-6 col-md-5 blog-content">
						<div class="entry-inner">
							<div class="entry-header">
								<h3 class="entry-title"><?php the_title() ?></h3>
								<span class="date"><?php the_time(get_option('date_format')) ?></span>
							</div>
							<div class="entry-content">
								<?php the_excerpt(); ?>
							</div>
							<div class="read-more">
								<a href="<?php the_permalink() ?>" class="btn read-more-btn">Read More</a>
							</div>

						</div>
					</div>
				</div>
			</article>

		<?php endwhile; ?>


	</div>
	<div class="col-md-3 sidebar" role="complementary">
		<?php dynamic_sidebar( 'blog_widgets' ); ?>
	</div>
</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>