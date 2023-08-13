<?php
/* Template Name: Portfolio Template 
 *
 */
get_header() ?>
<section class="page-container">
    <?php
    if (have_posts()) { /* Title of page */
        while (have_posts()) {
            the_post();
    ?>
            <h2 class="title"> <?php the_title(); ?> </h2>
    <?php
        }
    }
    ?>
    <section class="project-category-container">
        <ul class="category-container">
            <?php /* use to get the archive listing? */
            $taxonomyArgs = array(
                'taxonomy'      => 'project_category',
                'hide_empty'    => false,
            );
            $terms = get_terms($taxonomyArgs);

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
            ?>
                    <li class="category-term"> <!-- add wp class that adds a number to a post pulled from db? -->
                        <?php esc_html_e($term->name) ?>
                    </li>
            <?php }
            } else {
                echo 'No custom taxonomies found.';
            }
            ?>
        </ul>
    </section>

    <section class="project-grid-container">
        <?php
        $args = array(
            'post_type'      => 'project', // Replace with your custom post type slug
            'posts_per_page' => 10, // Number of posts to display
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) { /* Loops through projects in project admin menu */
                $custom_query->the_post();
        ?>
                <div class="thumbnail-container">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'thumbnail-img']); ?>
                    </a>
                </div>
        <?php
            }
            wp_reset_postdata(); // required after every custom query loop
        } else {
            echo 'No posts found.';
        }
        ?>
    </section>
</section>
</main>
<?php get_footer(); ?>

<script>
    const categoryButtons = document.querySelectorAll('category-term');
    const projects = document.querySelectorAll(".project");
    categoryButtons.forEach(button => {
        button.addEventListener("click", function() {
            const category = button.getAttribute();
        })
    })
</script>