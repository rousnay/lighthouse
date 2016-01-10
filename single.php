<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lighthouse
 */

get_header(); ?>

<?php 
//get the blog info
$blog_url = get_permalink( get_option('page_for_posts' ) );
$blog_title = get_the_title( get_option('page_for_posts' ) );
?>
	<div class="title-wrapper">
		<div class="container blog-wrapper">
			<div class="row">
			<div class="col-xs-12">
				<h1 class="entry-title">Lighthouse News Centre</h1> <div class="back-to"> <span> | </span><a href="<?php echo get_site_url(); ?>/news-centre">back</a></div>
			</div>
			</div>
		</div>
	</div>
	<div id="primary" class="container content-area blog-wrapper">
		<div class="row">
			<div class="col-md-9 blog-listing">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					$url = $thumb[0];
				?> 

				<div class="post-img">
				<img class="img-responsive" src="<?php echo $url; ?>">
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

				<div class="related-art row">
					<div class="col-xs-12">
						<div class="owl-carousel owl-theme">
								
							<?php
							 $postslist = get_posts('numberposts=4&order=DESC&orderby=date');
							 foreach ($postslist as $post) :
							    setup_postdata($post);
							 ?>
							 <div class="entry">

							 	<?php echo the_post_thumbnail($recent->ID, 'thumbnail'); ?>

							 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							 <?php the_time(get_option('date_format')) ?>

							 <?php the_excerpt(); ?>

							 </div>
							 <?php endforeach; ?>

						</div>
					</div>
				</div>


			</div>
		<div class="col-md-3 sidebar" role="complementary">
			<?php dynamic_sidebar( 'blog_widgets' ); ?>
		</div>
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
