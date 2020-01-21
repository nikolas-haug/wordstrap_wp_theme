<?php  

// Enqueue theme stylesheets and scripts
function wordstrap_theme_scripts() {
    global $ver_num; // define global variable for the version number
    $ver_num = mt_rand(); // on each call/load of the style the $ver_num will get a different value

    // or: only get the version number associated with the main theme stylesheet (better for browser cacheing essential assets)
    $theme = wp_get_theme(  );
    define('THEME_VERSION', $theme->Version); // gets version written in your style.css

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri(  ), array(), THEME_VERSION, all );
}
add_action( 'wp_enqueue_scripts', 'wordstrap_theme_scripts' );