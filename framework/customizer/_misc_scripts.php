<?php
function nitro_customize_register_misc($wp_customize) {
    //Upgrade to Pro
    $wp_customize->add_section(
        'nitro_sec_pro',
        array(
            'title'     => __('Important Links','nitro'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'nitro_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Nitro_WP_Customize_Upgrade_Control(
            $wp_customize,
            'nitro_pro',
            array(
                'description'	=> '<a class="nitro-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'nitro').'</a>
                                    <a class="nitro-important-links" href="https://inkhive.com/documentation/nitro" target="_blank">'.__('Nitro Documentation', 'nitro').'</a>
                                    <a class="nitro-important-links" href="https://demo.inkhive.com/nitro-plus/" target="_blank">'.__('Nitro Plus Live Demo', 'nitro').'</a>
                                    <a class="nitro-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'nitro').'</a>
                                    <a class="nitro-important-links" href="https://wordpress.org/support/theme/nitro/reviews" target="_blank">'.__('Review Nitro on WordPress', 'nitro').'</a>',
                'section' => 'nitro_sec_pro',
                'settings' => 'nitro_pro',
            )
        )
    );
}
add_action('customize_register', 'nitro_customize_register_misc');