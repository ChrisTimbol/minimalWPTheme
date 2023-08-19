<?php
/* 
 *  functions for theme
 */

add_theme_support('post-thumbnails'); /* Allow post-thumbnails , main usage is for portfolio images */

function theme_files() { /* this function is use to enqueue Styling, fonts, and .js scripts into wordpress */
    // css files 
    wp_enqueue_style('main-style', get_theme_file_uri('/css/index.css'));
    wp_enqueue_style('header-style', get_theme_file_uri('/css/header.css'));
    wp_enqueue_style('footer-style', get_theme_file_uri('/css/footer.css'));
    wp_enqueue_style('page-style', get_theme_file_uri('/css/page.css'));
    wp_enqueue_style('portfolio-style', get_theme_file_uri('/css/portfolio.css'));
    wp_enqueue_style('archive-style', get_theme_file_uri('/css/archive.css'));
    wp_enqueue_style('search-style', get_theme_file_uri('/css/search.css'));
    wp_enqueue_style('comments-style', get_theme_file_uri('/css/comments.css'));
    wp_enqueue_style('single-style', get_theme_file_uri('/css/single.css'));
    wp_enqueue_style('searchform-style', get_theme_file_uri('/css/searchform.css'));
   
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap');

    // Custom Search Script
    wp_enqueue_script('custom-search', get_template_directory_uri() . '/js/searchbar-animation.js', array(), null, true);

    // Only include the script on the portfolio template page
    if (is_page_template('portfolio.php')) { 
        wp_enqueue_script('category-filter', get_template_directory_uri() . '/js/portfolio-category-filter.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'theme_files'); 

function my_custom_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Header Search Area',
            'id'            => 'header-search-sidebar',
            'description'   => 'sidebar next to main content',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_widgets_init' );
function custom_excerpt_more($more){
    return '... <a class="archive-permalink" href="' . get_permalink() . '">Continue Reading...</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');
function register_my_menus()
{ 
    register_nav_menus(
        array(
            'primary' => __('Primary Menu'), // creates a header-menu var location to refer to in wp
        )
    );
}
add_action('init', 'register_my_menus'); // add to wp


function add_search_box_to_menu($items, $args)
{
    if ($args->theme_location == 'primary') { // You can replace 'primary' with your custom menu's slug
        $search_form = get_search_form(false); // This fetches the default WordPress search form
        $items .= '<li class="menu-item-search">' . $search_form . '</li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_box_to_menu', 10, 2);

function register_project_post_type()
{ // adds project post type to admin bar
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Projects', 'Post Type Singular Name', 'text_domain'),
    );

    $args = array(
        'label' => __('Projects', 'minimal-text-domain'),
        'labels'                => $labels,
        'description' => __('a place for project items'),
        'public' => true,
        'hierarchical' => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 4,
        'supports' => array('title', 'editor', 'thumbnail'),
        
    );

    register_post_type('project', $args);
}
add_action('init', 'register_project_post_type');

function custom_project_category_taxonomy()
{ /* Custom category taxonomy for projects */
    $labels = array(
        'name' => 'Project Categories',
        'singular_name' => 'Project Category',
        'search_items' => 'Search Project Categories',
        'all_items' => 'All Project Categories',
        'parent_item' => 'Parent Project Category',
        'parent_item_colon' => 'Parent Project Category:',
        'edit_item' => 'Edit Project Category',
        'update_item' => 'Update Project Category',
        'add_new_item' => 'Add New Project Category',
        'new_item_name' => 'New Project Category Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
    );
    register_taxonomy('project_category', 'project', $args); /* (taxonomy name, associatedWithPostType, $args) */
}
add_action('init', 'custom_project_category_taxonomy');
