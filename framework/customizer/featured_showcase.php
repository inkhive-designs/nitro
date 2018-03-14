<?php
function nitro_customize_register_showcase($wp_customize) {
    //CUSTOM SHOWCASE
    $wp_customize->add_panel( 'nitro_showcase_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Custom Showcase',
    ) );

    $wp_customize->add_section(
        'nitro_sec_showcase_options',
        array(
            'title'     => __('Enable/Disable','nitro'),
            'priority'  => 0,
            'panel'     => 'nitro_showcase_panel'
        )
    );


    $wp_customize->add_setting(
        'nitro_showcase_enable',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_showcase_enable', array(
            'settings' => 'nitro_showcase_enable',
            'label'    => __( 'Enable Showcase on Front Page.', 'nitro' ),
            'section'  => 'nitro_sec_showcase_options',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'nitro_showcase_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'nitro_showcase_title', array(
            'settings' => 'nitro_showcase_title',
            'label'    => __( 'Title','nitro' ),
            'section'  => 'nitro_sec_showcase_options',
            'type'     => 'text',
        )
    );


    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.
        $wp_customize->add_section(
            'nitro_showcase_sec'.$i,
            array(
                'title'     => 'ShowCase '.$i,
                'priority'  => $i,
                'panel'     => 'nitro_showcase_panel',

            )
        );

        $wp_customize->add_setting(
            'nitro_showcase_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'nitro_showcase_img'.$i,
                array(
                    'label' => '',
                    'section' => 'nitro_showcase_sec'.$i,
                    'settings' => 'nitro_showcase_img'.$i,
                )
            )
        );

        $wp_customize->add_setting(
            'nitro_showcase_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'nitro_showcase_title'.$i, array(
                'settings' => 'nitro_showcase_title'.$i,
                'label'    => __( 'Showcase Title','nitro' ),
                'section'  => 'nitro_showcase_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'nitro_showcase_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'nitro_showcase_desc'.$i, array(
                'settings' => 'nitro_showcase_desc'.$i,
                'label'    => __( 'Showcase Description','nitro' ),
                'section'  => 'nitro_showcase_sec'.$i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'nitro_showcase_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'nitro_showcase_url'.$i, array(
                'settings' => 'nitro_showcase_url'.$i,
                'label'    => __( 'Target URL','nitro' ),
                'section'  => 'nitro_showcase_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'nitro_customize_register_showcase');