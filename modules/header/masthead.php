<header id="masthead" class="site-header" role="banner">
    <div class="container masthead-container">
        <div class="site-branding">
            <?php if ( nitro_has_logo() ) : ?>
                <div id="site-logo">
                    <?php nitro_logo() ?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>

        <?php get_template_part('/modules/navigation/main', 'navigation'); ?>

        <div id="searchicon">
            <i class="fa fa-search"></i>
        </div>

    </div>

</header><!-- #masthead -->