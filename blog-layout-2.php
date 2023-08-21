<?php
/*  
    Template Name:  Blog layout with sidebar
*/
get_header();
?>

<aside class="main-sidebar">
    <?php if (is_active_sidebar('blog-sidebar')) : ?>
        <?php dynamic_sidebar('blog-sidebar'); ?>
    <?php else : ?>
        <p>Please add widgets to the sidebar.</p>
    <?php endif; ?>
</aside>
<main class="blog-layout-2-container">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <article class="post-container">
                <header class="post-header">
                    <h2>
                        <a class="title" href="<?php echo esc_url(get_permalink()); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="date-category">
                        posted in <?php echo get_the_category_list(', '); ?> on
                        <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                            <?php the_time('F j, Y'); ?>
                        </a>
                        by <?php the_author_posts_link(); ?>
                        <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <?php comments_number('0 comments', '1 comment', '% comments'); ?>
                        </a>
                    </p>
                </header>
                <div class="post-description">
                    <?php the_excerpt(); ?>
                </div>
                <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
            </article>
    <?php
        endwhile;
    endif;
    ?>
    <?php get_footer(); ?>