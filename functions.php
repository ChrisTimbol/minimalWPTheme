<?php

/* enqueues style.css to wordpress */
function theme_files()
{
    wp_enqueue_style( 'mytheme-style', get_theme_file_uri('/css/style.css') ); 
}
add_action('wp_enqueue_scripts', 'theme_files');
 
function register_my_menus(){
    register_nav_menus(
        array(
            'header-menu' =>__( 'Header Menu'),
            'extra-menu' => __( 'Extra Menu' )
        )
        );
}

add_action('init', 'register_my_menus')

?>