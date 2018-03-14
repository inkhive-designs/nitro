<?php
function nitro_customize_register_featured_post_areas($wp_customize) {
    //Extra Panel for Users, who do and dont have WooCommerce

    // CREATE THE fcp PANEL
    $wp_customize->add_panel( 'nitro_a_fcp_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Featured Posts Showcase',
        'description'    => '',
    ) );


    //SQUARE BOXES
    $wp_customize->add_section(
        'nitro_a_fc_boxes',
        array(
            'title'     => 'Square Boxes',
            'priority'  => 10,
            'panel'     => 'nitro_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'nitro_a_box_enable',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_a_box_enable', array(
            'settings' => 'nitro_a_box_enable',
            'label'    => __( 'Enable Square Boxes & Posts Slider.', 'nitro' ),
            'section'  => 'nitro_a_fc_boxes',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'nitro_a_box_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_a_box_title', array(
            'settings' => 'nitro_a_box_title',
            'label'    => __( 'Title for the Boxes','nitro' ),
            'section'  => 'nitro_a_fc_boxes',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'nitro_a_box_cat',
        array( 'sanitize_callback' => 'nitro_sanitize_product_category' )
    );

    $wp_customize->add_control(
        new Nitro_WP_Customize_Category_Control(
            $wp_customize,
            'nitro_a_box_cat',
            array(
                'label'    => __('Posts Category.','nitro'),
                'settings' => 'nitro_a_box_cat',
                'section'  => 'nitro_a_fc_boxes'
            )
        )
    );


    //SLIDER
    $wp_customize->add_section(
        'nitro_a_fc_slider',
        array(
            'title'     => __('3D Cube Post Slider','nitro'),
            'priority'  => 10,
            'panel'     => 'nitro_a_fcp_panel',
            'description' => 'This is the Posts Slider, displayed left to the square boxes.',
        )
    );


    $wp_customize->add_setting(
        'nitro_a_slider_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_a_slider_title', array(
            'settings' => 'nitro_a_slider_title',
            'label'    => __( 'Title for the Slider', 'nitro' ),
            'section'  => 'nitro_a_fc_slider',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'nitro_a_slider_count',
        array( 'sanitize_callback' => 'nitro_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'nitro_a_slider_count', array(
            'settings' => 'nitro_a_slider_count',
            'label'    => __( 'No. of Posts(Min:3, Max: 10)', 'nitro' ),
            'section'  => 'nitro_a_fc_slider',
            'type'     => 'range',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 10,
                'step'  => 1,
                'class' => 'test-class test',
                'style' => 'color: #0a0',
            ),
        )
    );

    $wp_customize->add_setting(
        'nitro_a_slider_cat',
        array( 'sanitize_callback' => 'nitro_sanitize_product_category' )
    );

    $wp_customize->add_control(
        new Nitro_WP_Customize_Category_Control(
            $wp_customize,
            'nitro_a_slider_cat',
            array(
                'label'    => __('Category For Slider.','nitro'),
                'settings' => 'nitro_a_slider_cat',
                'section'  => 'nitro_a_fc_slider'
            )
        )
    );



    //COVERFLOW

    $wp_customize->add_section(
        'nitro_a_fc_coverflow',
        array(
            'title'     => __('Top CoverFlow Slider','nitro'),
            'priority'  => 5,
            'panel'     => 'nitro_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'nitro_a_coverflow_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_a_coverflow_title', array(
            'settings' => 'nitro_a_coverflow_title',
            'label'    => __( 'Title for the Coverflow', 'nitro' ),
            'section'  => 'nitro_a_fc_coverflow',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'nitro_a_coverflow_enable',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_a_coverflow_enable', array(
            'settings' => 'nitro_a_coverflow_enable',
            'label'    => __( 'Enable', 'nitro' ),
            'section'  => 'nitro_a_fc_coverflow',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'nitro_a_coverflow_cat',
        array( 'sanitize_callback' => 'nitro_sanitize_category' )
    );


    $wp_customize->add_control(
        new Nitro_WP_Customize_Category_Control(
            $wp_customize,
            'nitro_a_coverflow_cat',
            array(
                'label'    => __('Category For Image Grid','nitro'),
                'settings' => 'nitro_a_coverflow_cat',
                'section'  => 'nitro_a_fc_coverflow'
            )
        )
    );

    $wp_customize->add_setting(
        'nitro_a_coverflow_pc',
        array( 'sanitize_callback' => 'nitro_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'nitro_a_coverflow_pc', array(
            'settings' => 'nitro_a_coverflow_pc',
            'label'    => __( 'Max No. of Posts in the Grid. Min: 5.', 'nitro' ),
            'section'  => 'nitro_a_fc_coverflow',
            'type'     => 'number',
            'default'  => '0'
        )
    );
}
add_action('customize_register', 'nitro_customize_register_featured_post_areas');