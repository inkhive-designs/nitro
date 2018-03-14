<div id="top-bar">
    <div class="container">
        <div class="social-icons">
            <?php get_template_part('/modules/social/social', 'fa'); ?>
        </div>

        <div id="woocommerce-zone">
            <?php if (class_exists('woocommerce')) : ?>
                <div id="top-cart">
                    <div class="top-cart-icon">


						<span class="cart-contents" title="<?php _e('View your shopping cart', 'nitro'); ?>">
							<div class="count"><?php echo sprintf(_n('%d item', '%d items', esc_html( WC()->cart->cart_contents_count, 'nitro') ), esc_html( WC()->cart->cart_contents_count) );?></div>
							<div class="total"> <?php echo esc_html(WC()->cart->get_cart_total()); ?> </div>

							<a class="links" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>"><?php _e('Go to Cart','nitro'); ?></a>
							<a class="links" href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>"><?php _e('Checkout','nitro'); ?></a>
						</span>



                        <i class="fa fa-shopping-bag"></i>
                    </div>
                </div>

                <div id="userlinks">
                    <?php if ( is_user_logged_in() ) { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('My Account','nitro'); ?>"><?php _e('My Account','nitro'); ?></a>
                    <?php }
                    else { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('Login / Register','nitro'); ?>"><?php _e('Login / Register','nitro'); ?></a>
                    <?php } ?>
                </div>

            <?php endif; ?>


        </div>

        <?php get_template_part('/modules/navigation/top', 'navigation'); ?>

    </div>

</div>