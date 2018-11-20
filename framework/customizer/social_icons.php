<?php
function nitro_customize_register_social($wp_customize) {
    // Social Icons
    $wp_customize->add_section('nitro_social_section', array(
        'title' => __('Social Icons', 'nitro'),
        'priority' => 44,
        'panel'     => 'nitro_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-', 'nitro'),
        'facebook' => __('Facebook', 'nitro'),
        'twitter' => __('Twitter', 'nitro'),
        'google-plus' => __('Google Plus', 'nitro'),
        'instagram' => __('Instagram', 'nitro'),
        'rss' => __('RSS Feeds', 'nitro'),
        'pinterest-p' => __('Pinterest', 'nitro'),
        'vimeo-square' => __('Vimeo', 'nitro'),
        'youtube' => __('Youtube', 'nitro'),
        'flickr' => __('Flickr', 'nitro'),
    );

    $social_count = count($social_networks);

    for ($x = 1; $x <= ($social_count - 3); $x++) :

        $wp_customize->add_setting(
            'nitro_social_' . $x, array(
            'sanitize_callback' => 'nitro_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control('nitro_social_' . $x, array(
            'settings' => 'nitro_social_' . $x,
            'label' => __('Icon ', 'nitro') . $x,
            'section' => 'nitro_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'nitro_social_url' . $x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('nitro_social_url' . $x, array(
            'settings' => 'nitro_social_url' . $x,
            'description' => __('Icon ', 'nitro') . $x . __(' Url', 'nitro'),
            'section' => 'nitro_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function nitro_sanitize_social($input)
    {
        $social_networks = array(
            'none',
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'pinterest-p',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if (in_array($input, $social_networks))
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'nitro_customize_register_social');