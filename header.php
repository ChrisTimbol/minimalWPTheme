<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--  -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header">
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </h1>
        <h2 class="site-description">
            <?php bloginfo('description'); ?>
        </h2>

        <!-- Generates navmenu with sidebar for search container -->
        <nav class="site-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'site-nav-list',
                    'container' => false,
                )
            );
            ?>
<!--             <div class="searchbar-container">
      
            </div> -->
        </nav>
    </header>
    <div class="main-wrapper">
