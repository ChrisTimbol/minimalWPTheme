<?php
/* Template Name: Portfolio Template 
 *
 */
get_header() ?>
<section class="page-container">
    <?php
    if (have_posts()) : // Start if
        while (have_posts()) : the_post(); // Start loop
    ?>
            <h2 class="title"><?php the_title(); ?></h2>
    <?php
        endwhile; // End loop
    endif; // End if
    ?>

    <section class="project-category-container">
        <ul class="category-container">

            <!-- all category -->
            <li class="category-term" data-category="all"><?php esc_html_e(' all ', 'minimal-text-domain'); ?></li>

            <?php
            $terms = get_terms(array( /* select project_category taxonomy  */
                'taxonomy'   => 'project_category',
                'hide_empty' => false,
            ));

            if ($terms && !is_wp_error($terms)) :
                foreach ($terms as $term) :
            ?>
                <li class="category-term" data-category="<?php echo esc_attr($term->name); ?>">
                    <?php echo esc_html($term->name); ?>
                </li>
            <?php
                endforeach;
            else :
                esc_html_e('No custom taxonomies found.', 'minimal-text-domain');
            endif;
            ?>
        </ul>
    </section>
    <section class="project-grid-container">
        <?php
        $custom_query = new WP_Query(array(
            'post_type'      => 'project',
            'posts_per_page' => 10,
        ));

       
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();

                $categories = get_the_terms(get_the_ID(), 'project_category'); // Get category terms for each project
        ?>

                    <a href="<?php the_permalink(); ?>" class="thumbnail-container">
                       
                       <?php if ($categories && !is_wp_error($categories)) : // Adds a span label of the category name of each Project 
                        ?>
                            <?php foreach ($categories as $category) : ?>
                                <span class="category-label"><?php echo esc_html($category->slug); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!--                                             -->

                        <?php the_post_thumbnail('medium', ['class' => 'thumbnail-img']); // Project Image 
                        ?>
                    </a>
  
        <?php
            endwhile;
            wp_reset_postdata(); // Required after every custom query loop
        else :
            esc_html_e('No posts found.', 'minimal-text-domain');
        endif;
        ?>
    </section>
</section>
<?php get_footer(); ?>