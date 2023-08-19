<?php
/*
 * Search Results Template
 */
get_header();
?>

<section class="search-results-container">
    <h1 class="search-title">
        Search Results for: <?php echo get_search_query(); ?>
    </h1>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="search-result-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="date-category">
                    posted in <?php echo get_the_category_list(', '); ?> on
                    <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                        <?php the_time('F j, Y'); ?>
                    </a>
                    by <?php the_author_posts_link(); ?>
                    <a href="<?php echo esc_url(get_comments_link()); ?>">
                        <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                    </a>
                </p>
                <p><?php the_excerpt(); ?></p> <!-- excerpt -->
                <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="no-results">Sorry, no results were found for your search.</p>
    <?php endif; ?>
</section>