<?php 

/**
 * Shortcode: Recent Post Slider
 */
function recent_post_slider($atts, $content = null){

	ob_start();

	echo '<div class="post-slider row"><div id="recent-posts" class="owl-carousel">';

	global $post;
	$post_query = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page' => 12,
		'order'=>'DESC',
		'orderby' => 'date',
		)
	);

	if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post();
	$thumb_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lighthouse_related_post');
	$url_post = $thumb_post[0];
	$content = get_the_content();

	echo '<div class="col-xs-12"><div class="thumbnail thumbnail-hover">';
	echo '<img class="img-responsive" src=" ' . $url_post . '">';
	echo '<a href=" ' . get_permalink() .' " " title=" ' .  get_the_title() .' " class="overlay"></a>';
	echo '</div>';
	echo '<div class="entry">';
	echo '<h3><a href=" ' . get_permalink() . ' "> ' . get_the_title() . '</a></h3>';
	echo '<span class="date"> <i class="fa fa-clock-o"></i> ' . get_the_time(get_option('date_format')) .'</span>';
	echo '<div class="entry-content">' . wp_trim_words( $content , '27' ) . '</div>';
	echo '<div class="read-more">';
	echo '<a href="' . get_permalink() . ' " class="btn read-more-btn">View Article</a>';
	echo '</div>';
	echo '</div></div>';

	endwhile;
	wp_reset_postdata();
	endif;

	echo '</div></div>';

	$output = ob_get_clean();
	return $output;
}

add_shortcode('recent_posts','recent_post_slider');


/**
 * Shortcode: Recent Post Slider
 */
function member_logo_slider($atts, $content = null){

	ob_start();

	echo '<div class="members-logo row"> <div id="logo-slider" class="owl-carousel">';

	if( have_rows('members_logo', 'option') ):
		while ( have_rows('members_logo', 'option') ) : the_row();
	$logo_url = get_sub_field('logo');
	$company_link = get_sub_field('link');

	echo '<div class="thumbnail thumbnail-hover">';
	echo '<img class="img-responsive" src=" ' . $logo_url . '">';
	echo '<a href=" ' . $company_link .' " " title=" ' .  $company_link .' " class="link-full"></a>';
	echo '</div>';

	endwhile;
	else :
		echo '<div class="col-xs-12">Members Logo Slider not found! <be> please add some logo in theme setting page</div>';
	endif;
	echo '</div></div>';

	$output = ob_get_clean();
	return $output;
}

add_shortcode('members_logo','member_logo_slider');


/**
 * Shortcode: Share Price
 */
function share_price_feed($atts, $content = null){

	ob_start();

	$xmldat = file_get_contents('http://qfx.quartalflife.com/clients/uk/lighthouse_group/xml/xml.aspx');
	file_put_contents('./wp-content/themes/lighthouse/xml-feeds/share-price.xml', $xmldat);

	$url 	= './wp-content/themes/lighthouse/xml-feeds/share-price.xml';
	$xml 	= simplexml_load_file($url);
	$price 	= $xml->CurrentPrice;
	$change = $xml->Change;
	$change_pcent 	= $xml->PercentageChange;
	$volume = $xml->Volume;
	$Date 	= $xml->Date; 
	$time 	= $xml->time; 

	echo '<div class="share_price_feed">';

	echo '<div class="feed_options"><div class="share_data_title">Share Price:</div><div class="share_data">' . $price . '</div></div>';
	echo '<div class="feed_options"><div class="share_data_title">Change:</div><div class="share_data">' . $change . '</div></div>';
	echo '<div class="feed_options"><div class="share_data_title">Volume:</div><div class="share_data">' . $volume . '</div></div>';
	echo '<div class="feed_options"><div class="share_data_title">Date:</div><div class="share_data">' . $Date . '</div></div>';
	echo '<div class="feed_options"><div class="share_data_title">Time:</div><div class="share_data">' . $time . '</div></div>';

	echo '</div>';

	$output = ob_get_clean();
	return $output;
}

add_shortcode('share_price','share_price_feed');