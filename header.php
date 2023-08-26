<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="site-container">
        <header class="site-header">
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </h1>
            <h2 class="site-description">
                <?php bloginfo('description'); ?>
            </h2>
            <nav class="site-navigation">
                <div class="hamburger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary', 
                        'container' => false,
                        'menu_class' => 'site-nav-list',
             
                    )
                );
                ?>
            </nav>
        </header>