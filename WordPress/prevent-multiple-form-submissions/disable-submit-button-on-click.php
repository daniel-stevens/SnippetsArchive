/* Prevents multiple form submissions by disabling the submit button on click
Created due to issues with clients submitting multiple orders.
Tested on WooCommerce 8.9.3, WP 6.5.5 */
function disable_submit_button_on_click() {
    // Enqueue jQuery if it's not already enqueued
    wp_enqueue_script( 'jquery' );

    $custom_js = '
    jQuery(function($){
        var $form = $("form.checkout");
        var $submitButton = $form.find("button[type=\'submit\'], input[type=\'submit\']");

        // On form submission, disable the submit button and change text
        $form.on("submit", function(e){
            // Disable the submit button and change its text
            $submitButton.attr("disabled", "disabled");
            $submitButton.val("Submitting...");
            $submitButton.text("Submitting...");
        });

        // Listen for checkout errors to re-enable the button
        $(document.body).on("checkout_error", function(){
            // Re-enable the submit button and reset its text
            $submitButton.attr("disabled", false);
            $submitButton.val("Place order");
            $submitButton.text("Place order");
        });

        // Optionally, re-enable the button on AJAX errors
        $(document).ajaxError(function(event, xhr, settings){
            if (settings.url.indexOf("wc-ajax=checkout") !== -1) {
                // Re-enable the submit button and reset its text
                $submitButton.attr("disabled", false);
                $submitButton.val("Place order");
                $submitButton.text("Place order");
            }
        });
    });
    ';

    // Add the inline script after jQuery
    wp_add_inline_script( 'jquery', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'disable_submit_button_on_click' );