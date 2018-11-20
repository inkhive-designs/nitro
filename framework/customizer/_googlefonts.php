<?php
function nitro_customize_register_gfonts($wp_customize) {
    //Fonts
    $wp_customize->add_section(
        'nitro_typo_options',
        array(
            'title'     => __('Google Web Fonts','nitro'),
            'priority'  => 41,
            'panel'     => 'nitro_design_panel'
        )
    );

    $font_array = array('Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'nitro_title_font',
        array(
            'default'=> 'Lato',
            'sanitize_callback' => 'nitro_sanitize_gfont'
        )
    );

    function nitro_sanitize_gfont( $input ) {
        if ( in_array($input, array('Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'nitro_title_font',array(
            'label' => __('Title','nitro'),
            'settings' => 'nitro_title_font',
            'section'  => 'nitro_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'nitro_body_font',
        array(	'default'=> 'Open Sans',
            'sanitize_callback' => 'nitro_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'nitro_body_font',array(
            'label' => __('Body','nitro'),
            'settings' => 'nitro_body_font',
            'section'  => 'nitro_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'nitro_customize_register_gfonts');