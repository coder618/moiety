<?php
/**
 * Default Page template
 * 
 */

defined( 'ABSPATH' ) || exit;


get_header();
while ( have_posts() ) : the_post();

    echo "<div class='container'>";
        get_template_part( 'layout/banner-inner' );
        the_content();
    echo "</div>";

endwhile;

get_footer();
