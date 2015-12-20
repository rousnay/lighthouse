<?php
/**
 * Template Name: Divisions
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

<section class="achievements-content">
	<?php the_content(); ?>
</section>

<?php if( have_rows('achievements_local') ): ?>
<section class="achievements">
	<div class="title-area">
		<h1 class="page-title">Local</h1>
	</div>
	<ul id="accordion-local" class="achievements-list">
	<?php while( have_rows('achievements_local') ): the_row(); 
		$years = get_sub_field('years');
		$texts = get_sub_field('texts');
		?>

		<li class="achievement-item load-fadeInUp">
			<div class="achievement-year"><?php echo $years; ?></div>
			<div class="achievement-text"><?php echo $texts; ?></div>
		</li>
	<?php endwhile; ?>
	</ul>
</section>
<?php endif; ?>

<?php if( have_rows('achievements_local') ): ?>
<section class="achievements">
<div class="title-area">
		<h1 class="page-title">Regional</h1>
</div>
	<ul id="accordion-regional" class="achievements-list">
	<?php while( have_rows('achievements_regional') ): the_row(); 
		$years = get_sub_field('years');
		$texts = get_sub_field('texts');
		?>

		<li class="achievement-item load-fadeInUp">
			<div class="achievement-year"><?php echo $years; ?></div>
			<div class="achievement-text"><?php echo $texts; ?></div>
		</li>
	<?php endwhile; ?>
	</ul>
</section>
<?php endif; ?>


<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>