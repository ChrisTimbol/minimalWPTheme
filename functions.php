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
add_action('init', 'register_my_menus'); // add to wp

function register_portfolio_post_type(){ // adds portfolio post type to admnin bar
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
    );

    $args = array(
        'label' => __( 'Portfolio', 'text domain'),
        'labels'                => $labels,
        'description' => __('a place for portfolio items'),
        'public' => true,
        'hierarchical' => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 4,

    );
    register_post_type( 'portfolio', $args );
}
add_action('init', 'register_portfolio_post_type');

/*
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
   

    - Create projects taxonomy in functions
    - Create portfolio tab to create new
    - Pull category titles organize them into a list div
    - 

*/
?>

