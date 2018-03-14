<?php
function nitro_customize_register_header($wp_customize) {
    //Header Settings
    $wp_customize->get_section('title_tagline')->panel = "nitro_header_panel";
    $wp_customize->add_panel( 'nitro_header_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Header Settings',
    ) );


    $wp_customize->add_section( 'header_image' , array(
        'title'      => __( 'Header Image', 'nitro' ),
        'panel' => 'nitro_header_panel',
        'priority'   => 1,
    ) );

    $wp_customize->add_section( 'nitro_header_text' , array(
        'title'      => __( 'Header Text', 'nitro' ),
        'panel' => 'nitro_header_panel',
        'description' => __('This section will work only if an Header Image is set.','nitro'),
        'priority'   => 2,
    ) );

    $wp_customize->add_setting(
        'nitro_header_content_enable',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_header_content_enable', array(
            'settings' => 'nitro_header_content_enable',
            'label'    => __( 'Enable Header Contents.','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'nitro_header_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_header_title', array(
            'settings' => 'nitro_header_title',
            'label'    => __( 'Main Header Title','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'text',
            'active_callback' => 'nitro_show_header_content_options',

        )
    );

    $wp_customize->add_setting(
        'nitro_header_desc',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_header_desc', array(
            'settings' => 'nitro_header_desc',
            'label'    => __( 'Header Description','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'textarea',
            'active_callback' => 'nitro_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'nitro_header_btn1',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_header_btn1', array(
            'settings' => 'nitro_header_btn1',
            'label'    => __( 'Button 1 Text','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'text',
            'active_callback' => 'nitro_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'nitro_header_btn1_url',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'nitro_header_btn1_url', array(
            'settings' => 'nitro_header_btn1_url',
            'label'    => __( 'Button 1 URL','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'text',
            'active_callback' => 'nitro_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'nitro_header_btn2',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_header_btn2', array(
            'settings' => 'nitro_header_btn2',
            'label'    => __( 'Button 2 Text','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'text',
            'active_callback' => 'nitro_show_header_content_options',
        )
    );

    $wp_customize->add_setting(
        'nitro_header_btn2_url',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'nitro_header_btn2_url', array(
            'settings' => 'nitro_header_btn2_url',
            'label'    => __( 'Button 2 URL','nitro' ),
            'section'  => 'nitro_header_text',
            'type'     => 'text',
            'active_callback' => 'nitro_show_header_content_options',
        )
    );

    /* Active Callback Function */
    function nitro_show_header_content_options($control) {

        $option = $control->manager->get_setting('nitro_header_content_enable');
        return $option->value() == true ;

    }

    //Settings For Logo Area

    $wp_customize->add_setting(
        'nitro_hide_title_tagline',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_hide_title_tagline', array(
            'settings' => 'nitro_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'nitro' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    function nitro_title_visible( $control ) {
        $option = $control->manager->get_setting('nitro_hide_title_tagline');
        return $option->value() == false ;
    }
}
add_action('customize_register', 'nitro_customize_register_header');