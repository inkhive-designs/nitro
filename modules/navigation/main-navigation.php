<div id="slickmenu"></div>
<nav id="site-navigation" class="main-navigation" role="navigation">
    <?php $walker = new Nitro_menu_with_Icon;
    if (!has_nav_menu('primary')) { $walker = ''; }
    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
</nav><!-- #site-navigation -->