<?php
/* 
    Default page layout for new pages created
*/
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <main class="page-container" <?php post_class(); ?>>
            <header class="page-header">
                <h2 class="page-title">
                    <?php the_title(); ?>
                </h2>
            </header>
            <section class="page-content">
                <?php the_content(); ?>
            </section>
    <?php
    endwhile;
else :
    echo '<p>No page found.</p>';
endif;
    ?>
    <?php     // Display page links for paginated posts
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'Minimalistic'),
        'after'  => '</div>',
    ));

    ?>
        </main>
        <?php get_footer(); ?>