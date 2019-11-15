<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/* Register Widget Area */
add_action( 'widgets_init', 'moiety_register_template_sidebar' );
function moiety_register_template_sidebar(){
    register_sidebar(
        [
            'name' => 'Footer Widget Area',
            'id'            => 'footer-widget-area',
            'before_widget' => '<div class = "footer-widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ]
    );

    register_sidebar(
        [
            'name' => 'Blog Sidebar',
            'id'            => 'blog-sidebar',
            'before_widget' => '<div class = "sidebar-widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ]
    );

    register_sidebar(
        [
            'name' => 'Page Sidebar',
            'id'            => 'page-sidebar',
            'before_widget' => '<div class = "sidebar-widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ]
    );
}