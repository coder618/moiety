<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="wrapper" id="page-wrapper">
	<div class="container">
		<?php get_template_part( 'layout/banner', 'sidebar-layout' ); ?>

		<div class="row">

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-md-7">				
			
				<div class="page-content generic-style">
					<?php  the_content();  ?>	
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moiety' ),
							'after'  => '</div>',
						) );
					?>		
				</div>
			
			</div>
			<?php endwhile; // end of the loop. ?>

			<div class="col-md-4 sidebar-col right-sidebar-col">
				<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
					<div class="sidebar-container">
						<?php dynamic_sidebar( 'page-sidebar' ); ?>
					</div>
				<?php endif; ?>			
			</div>
		</div>
		
	</div>


</div><!-- #page-wrapper -->

<?php get_footer();
