<?php  defined( 'ABSPATH' ) || exit; ?>
<?php if( get_the_post_thumbnail_url( $post->ID , 'large' ) ) : ?>        
    <section class="banner banner-inner" style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>)" >
        <h1><?php echo esc_html( get_the_title() ); ?></h1>
    </section>
<?php endif;  ?>