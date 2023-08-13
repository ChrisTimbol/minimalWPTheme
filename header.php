<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <!-- can be used for adding styling to certain pages per page class -->
    <header class="header">
      <hgroup class="title-slogan-container"> 
        <div class="header-title-container"> 
        <h1 class="header-title">
            Read
        </h1>
        </div>
        <h2 class="header-slogan">
            . . . a minimalistic theme focused on readability.
        </h2>
       </hgroup> 
        <!-- Insert Image Div here ? -->

        <?php // inserts navigation in a <ul> <li> common list
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
    <main class="main-container">