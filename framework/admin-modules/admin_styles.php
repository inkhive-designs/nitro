<?php
/**
 * Enqueue Scripts for Admin
 */

function nitro_custom_wp_admin_style() {
wp_enqueue_style( 'nitro-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

}
add_action( 'customize_controls_print_styles', 'nitro_custom_wp_admin_style' );
