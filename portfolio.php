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
            <!-- Add an "All" category -->
            <li class="category-term" data-category="all">All</li>

            <?php /* use to get the archive listing? */
            $taxonomyArgs = array(
                'taxonomy'      => 'project_category',
                'hide_empty'    => false,
            );
            $terms = get_terms($taxonomyArgs);

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
            ?>
                    <li class="category-term" data-category="<?php echo esc_attr($term->slug); ?>">
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

                $post_id = get_the_ID();
                $categories = get_the_terms($post_id, 'project_category'); /* Get category terms for each project */
        ?>

                <div class="thumbnail-container">
                    <a href="<?php the_permalink(); ?>" class="testd">

                        <?php if ($categories && !is_wp_error($categories)) : ?> <!-- adds a span label of the category name of each Project -->
                            <?php foreach ($categories as $category) : ?>
                                <span class="category-label"><?php echo esc_html($category->name); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php the_post_thumbnail('medium', ['class' => 'thumbnail-img']); ?> <!-- Project Image -->
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
<?php get_footer(); ?>

<script>
    // JavaScript to handle category filtering
    document.addEventListener('DOMContentLoaded', function() {
        var categoryTerms = document.querySelectorAll('.category-term');
        var thumbnailContainers = document.querySelectorAll('.thumbnail-container');

        categoryTerms.forEach(function(term) {
            term.addEventListener('click', function() {
                var selectedCategory = this.getAttribute('data-category');

                thumbnailContainers.forEach(function(container) {
                    var isMatch = false;
                    var categoryLabels = container.querySelectorAll('.category-label');

                    categoryLabels.forEach(function(label) {
                        if (label.textContent === selectedCategory || selectedCategory === 'all') {
                            isMatch = true;
                        }
                    });

                    // Show or hide based on category match
                    container.style.display = isMatch ? 'block' : 'none';
                });
            });
        });
    });
</script>

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