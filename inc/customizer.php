<?php
defined( 'ABSPATH' ) || exit;


add_action('customize_register', 'moiety_footer_text');
add_action('customize_register', 'moiety_social_customize_register');

function  moiety_footer_text($wp_customize){
    
	$wp_customize->add_section( 'footer' , array(
		'title'      => esc_html__( 'Footer', 'moiety' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'footer_text' , array(
		'default'     => sprintf('<a href="%1$s">%2$s</a>', esc_url(__('https://wordpress.org/', 'moiety')), __('Proudly powered by WordPress', 'moiety')),
		'sanitize_callback'    => 'moiety_sanitize_html_text',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'        => esc_html__( 'Footer Text', 'moiety' ),
		'section'    => 'footer',
		'settings'   => 'footer_text',
		'type'       => 'textarea',
		'priority'    => 9
    ) );
    

}


function moiety_social_customize_register($wp_customize){
    
	$wp_customize->add_section( 'social' , array(
		'title'      => esc_html__( 'Social Links Setting', 'moiety' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'moiety_social_links[facebook]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback'    => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'moiety_social_links[facebook]', array(
		'label'        => esc_html__( 'Facebook', 'moiety' ),
		'section'    => 'social',
		'settings'   => 'moiety_social_links[facebook]',
		'priority'    => 9
	) );

	$wp_customize->add_setting( 'moiety_social_links[twitter]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback'    => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'moiety_social_links[twitter]', array(
		'label'        => esc_html__( 'Twitter', 'moiety' ),
		'section'    => 'social',
		'settings'   => 'moiety_social_links[twitter]',
		'priority'    => 9
	) );

	$wp_customize->add_setting( 'moiety_social_links[instagram]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback'    => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'moiety_social_links[instagram]', array(
		'label'        => esc_html__( 'Instagram', 'moiety' ),
		'section'    => 'social',
		'settings'   => 'moiety_social_links[instagram]',
		'priority'    => 9
	) );

	$wp_customize->add_setting( 'moiety_social_links[github]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback'    => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'moiety_social_links[github]', array(
		'label'        => esc_html__( 'Github', 'moiety' ),
		'section'    => 'social',
		'settings'   => 'moiety_social_links[github]',
		'priority'    => 9
    ) );

    $wp_customize->add_setting( 'moiety_social_links[youtube]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback'    => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'moiety_social_links[youtube]', array(
		'label'        => esc_html__( 'Youtube', 'moiety' ),
		'section'    => 'social',
		'settings'   => 'moiety_social_links[youtube]',
		'priority'    => 9
    ) );
    
}


function moiety_sanitize_html_text( $value ) {
	$value = wp_kses_post( $value );
	return $value;
}