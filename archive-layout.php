<?php

/**
 * Template Name: Archive page layout
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
                'link_before' => '<span class="archive-column-item">',
                'link_after'  => '</span>',
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
</section>

<?php get_footer(); ?>