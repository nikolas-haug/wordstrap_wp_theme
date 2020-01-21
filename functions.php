<?php  

// Enqueue theme stylesheets and scripts
function wordstrap_theme_scripts() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri(  ) );
}
add_action( 'wp_enqueue_scripts', 'wordstrap_theme_scripts' );