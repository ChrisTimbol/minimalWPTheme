<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <!-- can be used for adding styling to certain pages per page class -->
        <header class="header">
            <h1 class="logo-title">
                TitleBlog
            </h1>
            <?php // inserts navigation menu here
            wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'navlinks', // css class to use for the ul element
                    'container' => 'nav',
                    'container_class' => 'navbar',
                )
            );
            ?>
        </header>
        <main class="page-container">