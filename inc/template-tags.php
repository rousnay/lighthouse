<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Lighthouse
 */

if ( ! function_exists( 'lighthouse_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lighthouse_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'lighthouse' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'lighthouse' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'lighthouse_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function lighthouse_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'lighthouse' ) );
		if ( $categories_list && lighthouse_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'lighthouse' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'lighthouse' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'lighthouse' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'lighthouse' ), esc_html__( '1 Comment', 'lighthouse' ), esc_html__( '% Comments', 'lighthouse' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'lighthouse' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lighthouse_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lighthouse_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lighthouse_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lighthouse_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lighthouse_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in lighthouse_categorized_blog.
 */
function lighthouse_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'lighthouse_categories' );
}
add_action( 'edit_category', 'lighthouse_category_transient_flusher' );
add_action( 'save_post',     'lighthouse_category_transient_flusher' );

/**
 * Custom Header Menus
 */
//Left menu
function lighthouse_header_menu_left() {
    if ( has_nav_menu( 'header-menu-left' ) ) {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu-left',
            'menu'            => '',
            'container'       => 'div',
            'container_id'    => 'header-menu-left-id',
            'container_class' => 'header-menu-left-cl',
            'menu_id'         => 'header-menu-id',
            'menu_class'      => 'header-menu-cl',
			'echo'            => true,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
        )
    );
    }
}

//Right menu
function lighthouse_header_menu_right() {
    if ( has_nav_menu( 'header-menu-right' ) ) {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu-right',
            'menu'            => '',
            'container'       => 'div',
            'container_id'    => 'header-menu-right-id',
            'container_class' => 'header-menu-right-cl',
            'menu_id'         => 'header-menu-id',
            'menu_class'      => 'header-menu-cl',
			'echo'            => true,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
        )
    );
    }
}