<?php
/* 
 *  enqueues style.css to wordpress 
 */

function theme_files(){
    wp_enqueue_style( 'main-style', get_theme_file_uri('/css/index.css')); 
    wp_enqueue_style( 'header-style', get_theme_file_uri('/css/header.css')); 
    wp_enqueue_style( 'footer-style', get_theme_file_uri('/css/footer.css')); 
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

/*
    - finish layout of page.php and single.php
    - Create about.php,  portfolio.php
    - comment.php
    - 404.php
    
    - Search bar
    - navbar sizing on page.php
    - font
    - color scheme
    - fix index.php blog post buttons
    - esc all 
   

*/
?>

