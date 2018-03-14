<?php
function nitro_customize_register_skin($wp_customize) {
    //Replace Header Text Color with, separate colors for Title and Description
        //Override nitro_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->get_section('colors')->panel = "nitro_design_panel";
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'nitro');
	$wp_customize->add_setting('nitro_site_titlecolor', array(
        'default'     => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nitro_site_titlecolor', array(
            'label' => __('Site Title Color','nitro'),
            'section' => 'colors',
            'settings' => 'nitro_site_titlecolor',
            'type' => 'color'
        ) )
    );

	$wp_customize->add_setting('nitro_header_desccolor', array(
        'default'     => '#777777',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nitro_header_desccolor', array(
            'label' => __('Site Tagline Color','nitro'),
            'section' => 'colors',
            'settings' => 'nitro_header_desccolor',
            'type' => 'color'
        ) )
    );

    //Select the Default Theme Skin
    $wp_customize->add_setting(
        'nitro_skin',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'nitro_sanitize_skin'
        )
    );

    $skins = array( 'default' => __('Default(Orange/Brown)','nitro'),
        'orange' =>  __('Orange/Blue','nitro'),
        'brown' =>  __('Fade Green/Brown','nitro'),
        'green' => __('Brick/Fade Green','nitro'),
        'grayscale' => __('GrayScale','nitro') );

    $wp_customize->add_control(
        'nitro_skin',array(
            'settings' => 'nitro_skin',
            'section'  => 'colors',
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function nitro_sanitize_skin( $input ) {
        if ( in_array($input, array('default','orange','brown','green','grayscale') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'nitro_customize_register_skin');
