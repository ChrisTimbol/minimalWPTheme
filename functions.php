<?php

/* enqueues style.css to wordpress */
function theme_files(){
    wp_enqueue_style( 'main-style', get_theme_file_uri('/css/style.css')); 
    wp_enqueue_style( 'header-style', get_theme_file_uri('/css/header.css')); 
   
}
add_action('wp_enqueue_scripts', 'theme_files');
 
function register_my_menus(){ // registers menu location in WP 
    register_nav_menus(
        array(
            'header-menu' =>__( 'Header Menu'), // creates a header-menu var location to refer to in wp
        )
        );
}

add_action('init', 'register_my_menus') // add to wp

//http://minimalistic-site.local/
//http://minimalistic-site.local/wp-admin/nav-menus.php?menu=16
//https://chat.openai.com/


/*
    post or page template?
    figure out links to pages and what the pages will be laid out
    links on post buttons
    portfolio layout
    add option to put blog on a seperate page
    add about page
    font
    color scheme

    // Page layout
    // Fix navbar layout and buttons
    // find a nice title font and research font in wordpress
    // complete single.php  for single post
    // create a 
        // page-about.php
        // page-portfolio.php
        // create a features tab with a dropdown to files
        // search bar
    // fix buttons
*/

/* 
7/31/
- spacing for nav figure out later
- font
- spacing for title
- page.php
- single.php
- footer.php
*/
?>

