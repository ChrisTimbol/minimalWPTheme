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
    - page.php
    - single.php
    - about.php (custom page template)
    - portfolio.php (custom page template make selectable by comment section at the top of portfolio.php etc... )
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

