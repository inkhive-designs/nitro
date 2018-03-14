<?php
function nitro_customize_register_overlap_slider($wp_customize) {
    //OVERLAP SLIDER
    $wp_customize->add_section(
        'nitro_overlap_slider',
        array(
            'title'     => __('OverLap Slider','nitro'),
            'priority'  => 35,
        )
    );

    $wp_customize->add_setting(
        'nitro_overlap_cat_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_overlap_cat_title', array(
            'settings' => 'nitro_overlap_cat_title',
            'label'    => __( 'Title for the Slider', 'nitro' ),
            'section'  => 'nitro_overlap_slider',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'nitro_overlap_enable',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_overlap_enable', array(
            'settings' => 'nitro_overlap_enable',
            'label'    => __( 'Enable', 'nitro' ),
            'section'  => 'nitro_overlap_slider',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'nitro_overlap_cat',
        array( 'sanitize_callback' => 'nitro_sanitize_category' )
    );


    $wp_customize->add_control(
        new Nitro_WP_Customize_Category_Control(
            $wp_customize,
            'nitro_overlap_cat',
            array(
                'label'    => __('Category','nitro'),
                'settings' => 'nitro_overlap_cat',
                'section'  => 'nitro_overlap_slider'
            )
        )
    );
}
add_action('customize_register', 'nitro_customize_register_overlap_slider');