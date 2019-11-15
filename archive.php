<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$moiety_nextPageLink = get_next_posts_link( "Next" ); 
$moiety_previousPageLink = get_previous_posts_link( "Previous" ); 
$moiety_navigation_wrapper_class = '';

if( $moiety_nextPageLink && $moiety_previousPageLink ){
	$moiety_navigation_wrapper_class = 'has-both-links';
}
?>

<div class="wrapper page-archive" id="archive-wrapper">


	<div class="container">
		<section class="banner banner-inner banner-archive">
			<?php 
            the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</section>
		
		<?php if ( have_posts() ) :  ?>
			<div class="post-posts-wrapper">
				<div class="items">		
				<?php	while ( have_posts() ) : the_post(); ?>
					<div class="item">
						<?php echo moiety_post_template($post->ID) ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>		
			
			<?php if( $moiety_nextPageLink || $moiety_previousPageLink ): ?>
			<div class="posts-navigation <?php 	echo $moiety_navigation_wrapper_class ?>">
				<?php echo $moiety_previousPageLink . $moiety_nextPageLink;  ?>			
			</div>
			<?php endif; ?>

		<?php endif; ?>
	</div>



</div><!-- #archive-wrapper -->

<?php get_footer();
