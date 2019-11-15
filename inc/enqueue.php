<?php
/**
 * moiety enqueue scripts
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'moiety_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function moiety_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/css/theme.css' );
		wp_enqueue_style( 'moiety-styles', get_template_directory_uri() . '/dist/css/theme.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/js/theme.js' );
		wp_enqueue_script( 'moiety-scripts', get_template_directory_uri() . '/dist/js/theme.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'moiety_scripts' ).

add_action( 'wp_enqueue_scripts', 'moiety_scripts' );
