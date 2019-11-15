<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 * This file contain some settings for theme
 * 
 */


// remove admin bar space
add_action('get_header', 'moiety_remove_admin_bar_space'); 

function moiety_remove_admin_bar_space() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


function moiety_filter_function_name( $excerpt ) {
	return substr($excerpt, 0, 100) .'  ...';
}
add_filter( 'get_the_excerpt', 'moiety_filter_function_name' );

// trim the title

function moiety_equal_the_title($str){
	$len = 35;

	if( strlen($str) > $len ){
		return substr($str, 0, $len) .'  ...';		
	}
	return $str;
}