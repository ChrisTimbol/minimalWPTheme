<?php
/* Template Name: Portfolio Template 
 *
 */
get_header() ?>
<main class="portfolio-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <h2 class="portfolio-title"><?php the_title(); ?></h2>
    <?php
        endwhile;
    endif;
    ?>
    <ul class="category-container">
        <?php
        $terms = get_terms(array( /* select project_category taxonomy  */
            'taxonomy'   => 'project_category',
            'hide_empty' => false,
        ));

        if ($terms && !is_wp_error($terms)) : ?>
            <li class="category-term" data-category="all"><?php esc_html_e(' all ', 'Minimalistic'); ?></li>

            <?php
            foreach ($terms as $term) :
            ?>
                <li class="category-term" data-category="<?php echo esc_attr($term->slug); ?>">
                    <?php echo esc_html($term->slug); ?>
                </li>
        <?php
            endforeach;
        endif;
        ?>
    </ul>

    <section class="project-grid-container">
        <?php
        $custom_query = new WP_Query(array(
            'post_type'      => 'project',
            'posts_per_page' => -1,
        ));
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();
                $categories = get_the_terms(get_the_ID(), 'project_category'); // Get category terms for each project
        ?>
                <a href="<?php the_permalink(); ?>" class="thumbnail-container">
                    <?php the_post_thumbnail('medium', ['class' => 'thumbnail-img']); // Project Image 
                    ?>

                    <?php if ($categories && !is_wp_error($categories)) : // Adds a span label of the category name of each Project 
                    ?>

                        <?php foreach ($categories as $category) : ?>
                            <span class="category-label"><?php echo esc_html($category->slug); ?></span>

                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="project-info">
                        <div class="project-title"><?php the_title(); ?> </div>
                        <div class="project-description"><?php the_excerpt(); ?></div>
                    </div>
                </a>
            <?php
            endwhile;
            wp_reset_postdata(); // Required after every custom query loop

        else : ?>
    </section>
    <div class="noPost">
        <?php esc_html_e('No posts found.', 'Minimalistic'); ?>
    </div>
<?php
        endif;
?>
<!-- Requires different pagination for custom taxonomy? -->
</main>
<?php get_footer(); ?>