<?php

require_once('widgets/class-wp-widget-categories.php');
require_once('widgets/class-wp-widget-recent-comments.php');
require_once('widgets/class-wp-widget-recent-posts.php');

require_once('class-wp-bootstrap-navwalker.php');

function wordstrap_theme_setup() {
    // Featured image support
    add_theme_support( 'post-thumbnails' );

    // Nav menus
    register_nav_menus( array(
        'primary' => __('Primary Menu')
    ) );
}
add_action( 'after_setup_theme', 'wordstrap_theme_setup' );

// Enqueue theme stylesheets and scripts
function wordstrap_theme_scripts() {
    global $ver_num; // define global variable for the version number
    $ver_num = mt_rand(); // on each call/load of the style the $ver_num will get a different value

    // or: only get the version number associated with the main theme stylesheet (better for browser cacheing essential assets)
    $theme = wp_get_theme(  );
    define('THEME_VERSION', $theme->Version); // gets version written in your style.css

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri(  ), array(), THEME_VERSION, all );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'wordstrap_theme_scripts' );

// Widget locations
function init_widgets($id) {
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="card">',
        'after_widget' => '</div>',
        'before_title' => '<div class="card-body bg-success"><h3 class="card-title mb-0">',
        'after_title' => '</h3></div>'
    ) );
}
add_action( 'widgets_init', 'init_widgets' );

// Adds 'list-group-item' to categories <li>
function add_new_class_list_categories($list) {
    $list = str_replace('cat-item', 'cat-item list-group-item', $list);
    return $list;
}
add_filter( 'wp_list_categories', 'add_new_class_list_categories' );

// Register widgets
function wordstrap_register_widgets() {
    register_widget('WP_Widget_Categories_Custom');
    register_widget('WP_Widget_Recent_Comments_Custom');
    register_widget('WP_Widget_Recent_Posts_Custom');
}
add_action( 'widgets_init', 'wordstrap_register_widgets' );

// Add comments