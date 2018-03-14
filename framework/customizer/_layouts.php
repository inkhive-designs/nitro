<?php
function nitro_customize_register_layouts($wp_customize) {
    // Layout and Design
    $wp_customize->get_section('background_image')->panel = 'nitro_design_panel';
    $wp_customize->add_panel( 'nitro_design_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','nitro'),
    ) );

    $wp_customize->add_section(
        'nitro_design_options',
        array(
            'title'     => __('Blog Layout','nitro'),
            'priority'  => 0,
            'panel'     => 'nitro_design_panel'
        )
    );


    $wp_customize->add_setting(
        'nitro_blog_layout',
        array( 'sanitize_callback' => 'nitro_sanitize_blog_layout' )
    );

    function nitro_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','nitro') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'nitro_blog_layout',array(
            'label' => __('Select Layout','nitro'),
            'settings' => 'nitro_blog_layout',
            'section'  => 'nitro_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','nitro'),
                'nitro' => __('Nitro Theme Layout','nitro'),
                'grid_2_column' => __('Grid - 2 Column','nitro'),
            )
        )
    );

    $wp_customize->add_section(
        'nitro_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','nitro'),
            'priority'  => 0,
            'panel'     => 'nitro_design_panel'
        )
    );

    $wp_customize->add_setting(
        'nitro_disable_sidebar',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_disable_sidebar', array(
            'settings' => 'nitro_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','nitro' ),
            'section'  => 'nitro_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'nitro_disable_sidebar_home',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_disable_sidebar_home', array(
            'settings' => 'nitro_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','nitro' ),
            'section'  => 'nitro_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'nitro_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'nitro_disable_sidebar_front',
        array( 'sanitize_callback' => 'nitro_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nitro_disable_sidebar_front', array(
            'settings' => 'nitro_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','nitro' ),
            'section'  => 'nitro_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'nitro_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'nitro_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'nitro_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'nitro_sidebar_width', array(
            'settings' => 'nitro_sidebar_width',
            'label'    => __( 'Sidebar Width','nitro' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','nitro'),
            'section'  => 'nitro_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'nitro_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function nitro_show_sidebar_options($control) {

        $option = $control->manager->get_setting('nitro_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'nitro_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','nitro'),
            'description'	=> __('Enter your Own Copyright Text.','nitro'),
            'priority'		=> 11,
            'panel'			=> 'nitro_design_panel'
        )
    );

    $wp_customize->add_setting(
        'nitro_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'nitro_footer_text',
        array(
            'section' => 'nitro_custom_footer',
            'settings' => 'nitro_footer_text',
            'type' => 'text'
        )
    );

}
add_action('customize_register', 'nitro_customize_register_layouts');