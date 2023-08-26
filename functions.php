<?php
/* 
 *  Adds functionality to WP theme
 */


add_theme_support( 'title-tag' );
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
    wp_enqueue_style('blog-layout-1-style', get_theme_file_uri('/css/blog-layout-1.css'));
    wp_enqueue_style('blog-layout-2-style', get_theme_file_uri('/css/blog-layout-2.css'));
    wp_enqueue_style('archive-layout-style', get_theme_file_uri('/css/archive-layout.css'));
    wp_enqueue_style('four-style', get_theme_file_uri('/css/404.css'));
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap');
    // Only include the script on the portfolio template page
    if (is_page_template('portfolio.php')) { 
        wp_enqueue_script('category-filter', get_template_directory_uri() . '/js/portfolio-category-filter.js', array(), null, true);
    }

    /* Enqueue hamburger js click */
    wp_enqueue_script('hamburger-script', get_template_directory_uri() . '/js/hamburger.js', array('jquery'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'theme_files'); 
function register_project_post_type() { // adds project post type to admin bar
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'Minimalistic'),
        'singular_name'         => _x('Projects', 'Post Type Singular Name', 'Minimalistic'),
    );
    $args = array(
        'label' => __('Projects', 'Minimalistic'),
        'labels'                => $labels,
        'description' => __('a place for project items', 'Minimalistic'),
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
function custom_project_category_taxonomy() { /* Custom category taxonomy for projects */
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
function my_custom_sidebars_init() { /* Use to create sidebar for header, needs work */
    register_sidebar(
        array(
            'name'          => 'Blog sidebar/widget area',
            'id'            => 'blog-sidebar',
            'description'   => 'area next to navbar links',
            'before_widget' => '<section class="widget">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">', 
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebars_init' );
function register_my_menus() { /* Register a menu locationfor user to edit */
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'Minimalistic'), // creates a header-menu var location to refer to in wp
        )
    );
}
add_action('init', 'register_my_menus'); 
function wpdocs_custom_excerpt_length( $length ) { /* Excerpt length */
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function my_footer_menu() { /* Menu for footer layout */
    register_nav_menu('footer-menu', __( 'Footer Menu', 'Minimalistic'));
}
add_action('init', 'my_footer_menu');


function custom_excerpt_length( $length ) { 
    if ( get_post_type() == 'project' ) {
        return 9; // Change 20 to the number of words you want for the 'project' post type
    }
    return $length; // Return default length for other post types
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_ellipsis( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_ellipsis' );


function my_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );
