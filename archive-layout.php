<?php
/*
 * Template Name: Archive 3 column page layout
 */
get_header();
?>

<main class="archive-page-container">

    <!-- Post Archives Section -->
    <section class="archive-column">
        <h2>Post Archives</h2>
        <ul class="archive-list">
            <?php
            wp_get_archives(array(
                'type'            => 'monthly',
                'format'          => 'html',
                'before'          => '<li>',
                'after'           => '</li>',
                'show_post_count' => false,
                'echo'            => 1,
                'order'           => 'DESC',
            ));
            ?>
        </ul>
    </section>

    <!-- Pages Section -->
    <section class="archive-column">
        <h2>Pages</h2>
        <ul class="archive-list">
            <?php
            wp_list_pages(array(
                'title_li' => '',
            ));
            ?>
        </ul>
    </section>

    <!-- Categories Section -->
    <section class="archive-column">
        <h2>Categories</h2>
        <ul class="archive-list">
            <?php
            wp_list_categories(array(
                'title_li' => '',
            ));
            ?>
        </ul>
    </section>

    <!-- Pagination Section -->
    <section class="pagination-wrapper">
        <?php
        the_posts_pagination(array(
            'mid_size'           => 2,
            'prev_text'          => __('&laquo; Previous', 'minimalistic'),
            'next_text'          => __('Next &raquo;', 'minimalistic'),
            'screen_reader_text' => __('Posts Navigation', 'minimalistic'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'text-domain') . ' </span>',
        ));
        ?>
    </section>

</main>

<?php get_footer(); ?>
