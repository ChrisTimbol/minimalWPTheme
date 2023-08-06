<?php
/* 
 *  enqueues style.css to wordpress 
 */

function theme_files(){
    wp_enqueue_style( 'main-style', get_theme_file_uri('/css/index.css')); 
    wp_enqueue_style( 'header-style', get_theme_file_uri('/css/header.css')); 
    wp_enqueue_style( 'footer-style', get_theme_file_uri('/css/footer.css')); 
    wp_enqueue_style( 'page-style', get_theme_file_uri('/css/page.css'));
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
    - Make more changes to page/single.php . The only thing seperating page/single from index is the title/continue link
    - figure out loop the:post for single pages and how it actually iterates
    - portfolio.php (custom page template make selectable by comment section at the top of portfolio.php etc... )
    - comment.php
    - search.php
    - 404.php
    - sidebar
    - footer columns
    - google fonts
    - ajax?
    - font
    - esc all safety
   

*/
?>

