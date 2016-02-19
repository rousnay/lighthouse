<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lighthouse
 */

get_header(); ?>

	<div class="title-wrapper">
		<div class="container blog-wrapper">
			<div class="row">
			<div class="col-xs-12">
				<h1 class="entry-title">Lighthouse News Centre</h1> <div class="back-to"> <span> | </span><a href="<?php echo get_site_url(); ?>/news-centre">back</a></div>
			</div>
			</div>
		</div>
	</div>
	<div id="primary" class="container content-area wider-wrapper">
		<div class="row">
			<div class="col-md-9 content-listing">
			
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					$thumb_feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lighthouse_feature_img');
					$url_feature = $thumb_feature[0];
				?> 

				<div class="post-img">
				<img class="img-responsive" src="<?php echo $url_feature; ?>">
				</div>

				<?php
				get_template_part( 'template-parts/content', get_post_format() );

					//the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
						
				<div class="post-slider row">
					<div class="col-xs-12">
						<h2>Related Artices</h2>
					</div>
						<div id="related-posts" class="owl-carousel">
							<?php
							 $postslist = get_posts('numberposts=99&order=DESC&orderby=date');
							 foreach ($postslist as $post) :
							    setup_postdata($post);
							 ?>
							 <div class="col-xs-12">
							 <div class="entry">

								<div class="thumbnail thumbnail-hover">
								<?php
									$thumb_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lighthouse_related_post');
									$url_post = $thumb_post[0];
								?>
									<img class="img-responsive" src="<?php echo $url_post; ?>">
									<a href="<?php the_permalink() ?>" title="<?php  the_title_attribute() ?>" class="overlay"></a>
								</div>

							 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<span class="date">
								<i class="fa fa-clock-o"></i>
								<?php the_time(get_option('date_format')) ?>
								</span>
							 </div>
							 </div>
							 <?php endforeach; ?>

						</div>
				</div>


			</div><!-- .blog-listing -->
		<div class="col-md-3 sidebar" role="complementary">
			<?php dynamic_sidebar( 'blog_widgets' ); ?>
		</div>
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
