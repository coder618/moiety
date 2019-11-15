<?php
/**
 * Check and setup theme's default settings
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'moiety_setup_theme_default_settings' ) ) {
	function moiety_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$moiety_posts_index_style = get_theme_mod( 'moiety_posts_index_style' );
		if ( '' == $moiety_posts_index_style ) {
			set_theme_mod( 'moiety_posts_index_style', 'default' );
		}

		// Sidebar position.
		$moiety_sidebar_position = get_theme_mod( 'moiety_sidebar_position' );
		if ( '' == $moiety_sidebar_position ) {
			set_theme_mod( 'moiety_sidebar_position', 'right' );
		}

		// Container width.
		$moiety_container_type = get_theme_mod( 'moiety_container_type' );
		if ( '' == $moiety_container_type ) {
			set_theme_mod( 'moiety_container_type', 'container' );
		}
	}
}
