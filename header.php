<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <meta name="description" content="<?php bloginfo('description'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url( '/' ); ?>"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php 
                    wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => false,
                        'menu_class'      => 'navbar-nav mr-auto',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
                <form method="GET" class="form-inline my-2 my-lg-0" action=<?php echo esc_url( site_url('/') ); ?>>
                    <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain') ?></label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="s" id="navbar-search">
                        <button type="submit" class="btn btn-primary"><?php _e('Search', 'textdomain') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </nav>