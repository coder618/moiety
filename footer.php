<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package moiety
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

    <div class="container">
        <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
            <div class="footer-widgets-container">
                    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="container">

        <div class="copyright">
            <p><?php echo wp_kses_post(get_theme_mod( 'footer_text', sprintf('<a href="%1$s">%2$s</a>', esc_url(__('//wordpress.org/', 'moiety')), __('Proudly powered by WordPress', 'moiety')) )); ?></p>
        </div>
    </div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

