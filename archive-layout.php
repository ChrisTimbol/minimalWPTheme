<?php

/**
 * Template Name: Archive page layout for individual dates etc
 */
get_header();
?>

<section class="archive-layout-container">
    <section class="archive-column">
        <h2>Post Archives</h2>
        <ul>
            <?php
            $args = array(
                'type'            => 'monthly',
                'limit'           => '',
                'format'          => 'html',
                'before'          => '<li>',
                'after'           => '</li>',
                'show_post_count' => false,
                'echo'            => 1,
                'order'           => 'DESC',
            );
            wp_get_archives($args);
            ?>
        </ul>
    </section>
    <section class="archive-column">
        <h2>Pages</h2>
        <ul>
            <?php
            wp_list_pages(array(
                'title_li' => '',
            ));
            ?>
        </ul>
    </section>
    <section class="archive-column">
        <h2>Categories</h2>
        <ul>
            <?php
            wp_list_categories(array(
                'title_li' => '',
            ));
            ?>
        </ul>
    </section>
    <div class="pagination-wrapper">
    <?php
    the_posts_pagination(array(
        'mid_size'           => 2,
        'prev_text'          => __('&laquo; Previous', 'text-domain'),
        'next_text'          => __('Next &raquo;', 'text-domain'),
        'screen_reader_text' => __('Posts Navigation', 'text-domain'),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'text-domain') . ' </span>',
    ));
    ?>
</div>
</section>

<?php get_footer(); ?>