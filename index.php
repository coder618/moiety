<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Prepare the loadmore button html
 * 
 */

$moiety_load_more_html = '';
$moiety_type = 'post';
$moiety_total_posts = wp_count_posts($moiety_type)->publish;
$moiety_posts_per_page = get_option( 'posts_per_page' );


// Check If current shown posts is smaller than total post 
if( $moiety_total_posts > $moiety_posts_per_page  ){
// if( true  ){
	$moiety_uid = uniqid();
	$moiety_admin_url = admin_url('admin-ajax.php');
	$moiety_attr= [];
	$moiety_loadmore_att_str = '';

	// Prepare The ajax Request Necessary attribute
	$moiety_attr['data-posttype'] = $moiety_type;
	$moiety_attr['data-posts_per_page'] = $moiety_posts_per_page;            
	$moiety_attr['data-ajax-url'] = $moiety_admin_url;
	$moiety_attr['data-container'] = $moiety_uid;
	$moiety_attr['data-page'] = 1;
	$moiety_attr['data-nonce'] = wp_create_nonce("loadmore_ajax_request");
	$moiety_attr['class'] = "btn btn-primary btn-lg custom-load-more-posts-btn";

	// Make the attribute string
	foreach($moiety_attr as $moiety_att=> $moiety_att_val){
		$moiety_loadmore_att_str .= $moiety_att . " = '".$moiety_att_val."'";                    
	}

	$moiety_load_more_html .= '<div class="render-posts-loadmore-btn-container button-container">';
		$moiety_load_more_html .= '<button '. $moiety_loadmore_att_str .' >'.__('Load More', 'moiety').'</button>';            
	$moiety_load_more_html .= "</div>";
}

?>

<div class="wrapper" id="index-wrapper">
	<div class="container">
		
		<?php if ( have_posts() ) : ?> 
		<div class="posts-wrapper post-posts-wrapper">
			<div class="items items-container render-posts-items post-type-post <?php echo $moiety_uid ?>">
				<?php  while ( have_posts() ) : the_post(); ?>
				<div class="item">
					<?php echo moiety_post_template($post->ID);  ?>				
				</div>
				<?php endwhile;  ?>
			</div>

			<?php echo $moiety_load_more_html;  ?>
		</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.','moiety' ); ?></p>
		<?php endif; ?>


	</div>
</div><!-- #index-wrapper -->

<?php get_footer();
