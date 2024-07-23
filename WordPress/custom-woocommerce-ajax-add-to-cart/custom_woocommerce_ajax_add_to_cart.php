function custom_woocommerce_ajax_add_to_cart() {
    if ( ! function_exists( 'is_woocommerce' ) ) {
        return;
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('body').on('click', '.ajax_add_to_cart', function(e) {
                e.preventDefault();
                var $thisbutton = $(this);

                if ($thisbutton.is('.disabled')) {
                    return;
                }

                $thisbutton.removeClass('added').addClass('loading');

                var data = {
                    action: 'woocommerce_ajax_add_to_cart',
                    product_id: $thisbutton.data('product_id'),
                    product_sku: $thisbutton.data('product_sku'),
                    quantity: $thisbutton.data('quantity')
                };

                $.post(woocommerce_params.ajax_url, data, function(response) {
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    }

                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    $thisbutton.removeClass('loading');
                });
            });
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'custom_woocommerce_ajax_add_to_cart' );

function custom_woocommerce_add_to_cart_fragments( $fragments ) {
    ob_start();
    ?>
    <div class="woocommerce-cart-fragments">
        <?php woocommerce_cart_link(); ?>
    </div>
    <?php
    $fragments['div.woocommerce-cart-fragments'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'custom_woocommerce_add_to_cart_fragments' );
