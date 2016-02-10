<?php 

/**
 * Read More button in excerpt
 */
function new_excerpt_more( $more ) {
	return '... <a class="readmore" href="' . get_permalink() . ' ">Read more <i class="fa fa-external-link"></i></a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Custome Lenght of excerpt
 */
// function custom_excerpt_length( $length ) {
//     return 50;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Numbered Pagination
 */
function pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>\n";
	}
}


/**
 * stop wp removing div tags
 */
function tinymce_settings( $settings ) {

    // html elements being stripped
	$settings['extended_valid_elements'] = 'div[*],article[*]';

    // only html elements to keep
    //$settings['valid_elements'] = 'a,strong/b,div,h1,h2,h3,section';

	// paste elements to keep
	//$opts = '*[*]';
	//$settings['paste_word_valid_elements'] = $opts;

    // don't remove line breaks
	$settings['remove_linebreaks'] = false;

	$settings['allow_html_in_named_anchor'] = true;

    // convert newline characters to BR
	$settings['convert_newlines_to_brs'] = true;

    // don't remove redundant BR
	$settings['remove_redundant_brs'] = false;

	// only html elements to keep
	//$settings['wpautop'] = false;

    // pass back to wordpress

	return $settings;
}

add_filter( 'tiny_mce_before_init', 'tinymce_settings' );