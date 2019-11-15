<?php
/**
 * Search page
 * @package moiety
 */

defined( 'ABSPATH' ) || exit;
get_header();


$moiety_nextPageLink = get_next_posts_link( "Next" ); 
$moiety_previousPageLink = get_previous_posts_link( "Previous" ); 
$moiety_navigation_wrapper_class = '';

if( $moiety_nextPageLink && $moiety_previousPageLink ){
	$moiety_navigation_wrapper_class = 'has-both-links';
}

  ?>
<div class="wrapper" id="page-wrapper">

  	<div class="container">
  
		<div class="banner banner-inner">
			<h1><?php _e("Search Result", 'moiety') ?></h1>
		</div>

		
		<div class="container search-item-container">

			<h1 class="page-title"><?php printf( esc_html__( 'You Search For: %s', 'moiety' ), '<span class="text-primary">' . get_search_query() . '</span>' ); ?></h1>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('loop-templates/content', 'search'); ?>
			<?php endwhile; ?>
			<?php else:  ?>
				<h3> <?php _e("Sorry nothing Found with you query", 'moiety')  ?></h3>
			<?php endif; ?>
		</div>

		<?php if( $moiety_nextPageLink || $moiety_previousPageLink ): ?>
		<div class="posts-navigation <?php 	echo $moiety_navigation_wrapper_class ?>">
			<?php echo $moiety_previousPageLink . $moiety_nextPageLink;  ?>			
		</div>
		<?php endif; ?>

  	</div>

</div>

<?php
get_footer();
