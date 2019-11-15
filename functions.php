<?php
/**
 * moiety functions and definitions
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$moiety_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/theme-setup.php',                     // Load Editor functions.
	
	'/loadmore-ajax.php',           		// Ajax Loadmore
	
	'/post-template/post-template.php',    // Load Editor functions.
	'/widget.php',                         // Register widget area.
	'/customizer.php',                         // Register widget area.

);

foreach ( $moiety_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

