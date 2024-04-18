function enqueue_custom_validation() {
    wp_enqueue_script('form-validation-js', get_stylesheet_directory_uri() . '/form_validation.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_validation');