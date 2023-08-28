<?php
/*
 * Template for when user searches with slug for post, category, date, etc.
 */
get_header();

function get_archive_title() {
    if (is_category()) {
        return single_cat_title('', false);
    } elseif (is_tag()) {
        return single_tag_title('', false);
    } elseif (is_author()) {
        return 'Posts by ' . get_the_author();
    } elseif (is_day()) {
        return 'Archive for <a href="' . esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">' . get_the_date() . '</a>';
    } elseif (is_month()) {
        return 'Archive for <a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_date('F Y') . '</a>';
    } elseif (is_year()) {
        return 'Archive for <a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_date('Y') . '</a>';
    } else {
        return 'Archives';
    }
}
?>

<main class="archive-container">

    <header class="archive-header">
        <h2 class="archive-title"><?php echo get_archive_title(); ?></h2>
    </header>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="post-container">
                <header class="post-header">
                    <h2 class="post-title">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-meta">
                        <span class="post-category">posted in <?php echo get_the_category_list(', '); ?> on</span>
                        <time class="post-date" datetime="<?php echo get_the_date('c'); ?>">
                            on <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                                <?php the_time('F j, Y'); ?>
                            </a>
                        </time>
                        <span class="post-author">by <?php the_author_posts_link(); ?></span>
                        <span class="post-comments">
                            <a href="<?php echo esc_url(get_comments_link()); ?>">
                                <?php comments_number('0 comments', '1 comment', '% comments'); ?>
                            </a>
                        </span>
                    </div>
                </header>
                <div class="post-description">
                    <?php the_excerpt(); ?>
                </div>
                <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="pagination-wrapper">
        <?php
        the_posts_pagination(array(
            'mid_size'           => 2,
            'prev_text'          => __('&laquo; Previous', 'minimalistic'),
            'next_text'          => __('Next &raquo;', 'minimalistic'),
            'screen_reader_text' => __('Posts Navigation', 'minimalistic'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'text-domain') . ' </span>',
        ));
        ?>
    </div>

</main>

<?php get_footer(); ?>
