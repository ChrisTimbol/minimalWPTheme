<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="title-slogan-container">
            <div class="header-title-container">
                <h1 class="header-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            </div>
            <h2 class="header-slogan">
                <?php bloginfo('description'); ?>
            </h2>
        </div>

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'header-menu',
                'menu_class' => 'navlinks',
                'container' => 'nav',
                'container_class' => 'navbar',
            )
        );
        ?>
    </header>
    <main class="main-container">