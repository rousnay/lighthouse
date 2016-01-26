<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lighthouse
 */

get_header(); ?>
	<div class="title-wrapper">
		<div class="container wider-wrapper">
			<div class="row">
			<div class="col-xs-12">
				<h1 class="entry-title">Lighthouse</h1> <div class="back-to"> <span> | </span><a href="<?php echo get_site_url(); ?>"> HOME </a> <span class="separator"> > </span> SEARCH RESULTS</div>
			</div>
			</div>
		</div>
	</div>
	<div id="primary" class="container content-area wider-wrapper">
		<div class="row">
			<div class="col-md-9 content-listing">
				<main id="main" class="site-main search-results" role="main">

				<?php query_posts($query_string . '&showposts=99');
				if ( have_posts() ) : ?>

					<header class="page-header">
						<div class="search-inner-page">
							<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							    <div class="search-wrap">
							    	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'presentation' ); ?></label>
							        <input type="search" placeholder="<?php echo esc_attr( 'Search', 'presentation' ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" autocomplete="off"/>
							         <button type="submit">
						                Search
						            </button>
							    </div>
							</form>
						</div>

						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'lighthouse' ), '<span>“' . get_search_query() . '”</span>' ); ?></h1>

					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				</main><!-- #main -->
				<div class="search-load">
					<div id="showLess">Show less [-]</div>
					<div id="loadMore">More result [+]</div>
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
