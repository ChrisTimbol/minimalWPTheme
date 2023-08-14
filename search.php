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
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="no-results">Sorry, no results were found for your search.</p>
    <?php endif; ?>
</section>
