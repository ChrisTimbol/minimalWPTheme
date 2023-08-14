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
            <li class="category-term" data-category="all"><?php esc_html_e('All', 'minimal-text-domain'); ?></li>

            <?php
            $terms = get_terms(array(
                'taxonomy'   => 'project_category',
                'hide_empty' => false,
            ));

            if ($terms && !is_wp_error($terms)) :
                foreach ($terms as $term) :
            ?>
                    <li class="category-term" data-category="<?php echo esc_attr($term->slug); ?>">
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
                <div class="thumbnail-container">
                    <a href="<?php the_permalink(); ?>" class="testd">
                        <?php if ($categories && !is_wp_error($categories)) : // Adds a span label of the category name of each Project 
                        ?>
                            <?php foreach ($categories as $category) : ?>
                                <span class="category-label"><?php echo esc_html($category->name); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php the_post_thumbnail('medium', ['class' => 'thumbnail-img']); // Project Image 
                        ?>
                    </a>
                </div>
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



<!--
    Checklist
    - create a <script> for now
        - Do I have to call the function script somehow in php? Probably
    - Select all menu items in javascript
    - for each 'menu item' (button => { add event Listener for click})
    - category = menuItem.getTextContent()
    - if category !== 'CategoryName' of thumbnail-container > span > class-name = category of post type
    - then we will change the display of all things that dont have the category clicked on in there span class name
    - Therefore we dont need to use ajax to call the server to filter out certain things by category.
    - This will keep thing simple, and allow us to create a static website that is minimal on everything but the necessities.
 -->