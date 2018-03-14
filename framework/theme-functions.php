<?php
/*
 * @package nitro, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin-modules/admin_styles.php';
require get_template_directory() . '/framework/admin-modules/register_styles.php';
require get_template_directory() . '/framework/admin-modules/theme_setup.php';
require get_template_directory() . '/framework/admin-modules/register_widgets.php';
require get_template_directory() . '/framework/admin-modules/logo_compatibility.php';
require get_template_directory() . '/framework/admin-modules/nav_walkers.php';

/*
 * Pagination Function. Implements core paginate_links function.
 */
function nitro_pagination() {
	the_posts_pagination(array('mid_size'=> 2));
}

/*
** Function to check if Sidebar is enabled on Current Page 
*/

function nitro_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('nitro_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('nitro_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('nitro_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function nitro_primary_class() {
	$sw = esc_html(get_theme_mod('nitro_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !nitro_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('nitro_primary-width', 'nitro_primary_class');

function nitro_secondary_class() {
	$sw = esc_html(get_theme_mod('nitro_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('nitro_secondary-width', 'nitro_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function nitro_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function nitro_fade($color, $val) {
	return "rgba(".nitro_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function nitro_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('nitro_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('nitro_blog_layout') );
	else :
		get_template_part( $ldir ,'grid');	
	endif;	
}
add_action('nitro_blog_layout', 'nitro_get_blog_layout');

/*
** Function to Set Main Class 
*/
function nitro_get_main_class(){
	
	$layout = get_theme_mod('nitro_blog_layout');
	if (strpos($layout,'nitro') !== false) {
	    	echo 'nitro-main';
	}		
}
add_action('nitro_main-class', 'nitro_get_main_class');

/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
	require get_template_directory() . '/framework/woocommerce.php';
endif;


/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


