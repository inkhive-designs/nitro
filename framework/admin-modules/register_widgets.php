<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nitro_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'nitro' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'nitro' ),
        'id'            => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'nitro' ),
        'id'            => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'nitro' ),
        'id'            => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'nitro' ),
        'id'            => 'footer-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'nitro_widgets_init' );

