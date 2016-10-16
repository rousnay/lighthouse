<?php 

// Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// Customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/includes/acf/';
    
    // return
    return $path;
}

// Customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/includes/acf/';
    
    // return
    return $dir;
}

// Save ACF field as JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/includes/acf-json';
    
    // return
    return $path; 
}

// Load ACF field from JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/includes/acf-json';
    
    // return
    return $paths;
}


/*****
 Options Page
***************/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Lighthouse General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'lighthouse-general-settings',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> '',
		'redirect'		=> false,
		'icon_url' => 'dashicons-layout'
		));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Announcement Slider',
		'menu_title'	=> 'Announcement',
		'menu_slug' 	=> 'announcement-slider',
		'parent_slug'	=> 'lighthouse-general-settings',
		));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Members Logo Slider',
		'menu_title'	=> 'Members Logo',
		'menu_slug' 	=> 'members-logo-slider',
		'parent_slug'	=> 'lighthouse-general-settings',
		));
}