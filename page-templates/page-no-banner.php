<?php
/**
 * Template Name: Page No Banner and Title
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="wrapper page-with-no-banner" id="page-wrapper">
	<div class="container">

		<div class="row">		

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-md-12">
			
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

		</div>
        
	</div>


</div><!-- #page-wrapper -->

<?php get_footer();
