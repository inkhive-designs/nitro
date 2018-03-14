<?php if ( is_front_page() && (get_header_image())) : ?>
    <div id="header-image">
        <div class="image">
            <img src="<?php echo header_image(); ?>" width="100%">
        </div>
        <?php if(get_theme_mod('nitro_header_content_enable', true)): ?>
            <div class="header-data" data-stellar-ratio="1.3" data-stellar-vertical-offset="0">
                <div class="header-title">
                    <?php echo esc_html(get_theme_mod('nitro_header_title')); ?>
                </div>
                <div class="description">
                    <?php echo esc_html(get_theme_mod('nitro_header_desc')); ?>
                </div>
                <div class="buttons">
                    <?php if (get_theme_mod('nitro_header_btn1')) : ?>
                        <div class="button1">
                            <a href="<?php echo esc_url( get_theme_mod('nitro_header_btn1_url') ); ?>"><?php echo esc_html(get_theme_mod('nitro_header_btn1')); ?></a>
                        </div>
                    <?php endif;
                    if (get_theme_mod('nitro_header_btn2')) : ?>
                        <div class="button2">
                            <a href="<?php echo esc_url( get_theme_mod('nitro_header_btn2_url') ); ?>"><?php echo esc_html(get_theme_mod('nitro_header_btn2')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

<?php endif; ?>