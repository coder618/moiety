<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'moiety_container_type' );
?>

<div class="wrapper">
	<div class="container">
		<img src="<?php echo get_template_directory_uri() . '/dist/img/404.jpg' ?>" alt="404 image">		
		<h1><?php _e("Wrong URL, Noting Found", "moiety") ?></h1>
		<a href="<?php echo  home_url() ?>" class="btn btn-primary"> <?php _e('Back To Home', 'moiety') ?> </a>
	</div>
</div><!-- #error-404-wrapper -->

<?php get_footer();
