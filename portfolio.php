<?php /* Template Name: Portfolio Template*/ ?>
<!-- 
  
     check  - pull categories get_categories_type_ also assign to post
      check  - pull post into portfolio page
        - figure out grid layout
        - repeat for template portfolio-2 option
    
 -->




<main class="site-main"><!-- same as index.php containers -->
    <section class="project-categories"><!-- same as index.php containers -->
        <?php /* use to get the archive listing? */
        $args = array(
            'taxonomy'   => 'project_category', // Replace 'taxonomy' with the actual name of your custom taxonomy
            'hide_empty' => false,
        );

        $terms = get_terms($args);

        // IF is not empty and is not an error
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
        ?>
                <li><?php esc_html_e($term->name) ?></li>
    
               

        <?php
            }
         
         
   
        } else {
            echo 'No custom taxonomies found.';
        }

        ?>

    </section>
    <section class="project-container">
        <?php
        $args = array(
            'post_type'      => 'project', // Replace with your custom post type slug
            'posts_per_page' => 10, // Number of posts to display
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) {
                $custom_query->the_post();
        ?>
                <div>
                    <?php 
                    the_title();
                    the_excerpt(); ?>
     <div><?php the_meta(); ?> <div>
                </div>
        <?php
            }
            wp_reset_postdata(); // Reset the global post data
        } else {
            echo 'No posts found.';
        }
        ?>
    </section>
</main>

