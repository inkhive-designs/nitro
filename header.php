<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nitro
 */
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nitro' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	
    <?php get_template_part('modules/header/top', 'bar'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

    <?php get_template_part('modules/header/header', 'content'); ?>


	<?php if( class_exists('rt_slider') ) {
		 rt_slider::render('/framework/featured-components/slider', 'swiper' );
	} ?>

	<?php get_template_part('/framework/featured-components/slider', 'overlap'); ?>

	<?php get_template_part('/framework/featured-components/featured', 'showcase'); ?>
	
	<div class="mega-container">
		
		<?php if (class_exists('woocommerce')) : ?>	
		<?php get_template_part('/framework/featured-components/coverflow', 'product'); ?>
		<?php get_template_part('/framework/featured-components/featured', 'products'); ?>
		<?php endif; ?>
		<?php get_template_part('/framework/featured-components/coverflow', 'posts'); ?>
		<?php get_template_part('/framework/featured-components/featured', 'posts'); ?>
	
		<div id="content" class="site-content container">