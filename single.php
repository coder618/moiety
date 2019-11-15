<?php
/**
 * The template for displaying all single posts.
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="single-wrapper">
	<div class="container">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'layout/banner-single', 'post' ); ?>

			<?php if(is_active_sidebar( 'blog-sidebar') && get_post_format($post->ID) == 'aside'  ):  ?>
				<div class="row">
					<div class="col-md-7">
						<div class="single-content generic-style">
							<?php the_content() ?>
						</div>						
					</div>

					<div class="col-md-4 sidebar-col right-sidebar-col">
						<div class="sidebar-container">
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						</div>
					</div>
				</div>	
			<?php else:  ?>			
				<div class="row">
					<div class="col-md-12">
						<div class="single-content generic-style">
							<?php the_content() ?>
						</div>						
					</div>
				</div>			
			<?php endif;  // if sidebar present ?>





			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :			
				comments_template();
			endif;
			?>
			<?php get_template_part( 'page-section/related-post'); ?>


		<?php endwhile; // end of the loop. ?>
	</div>




</div><!-- #single-wrapper -->

<?php get_footer();
