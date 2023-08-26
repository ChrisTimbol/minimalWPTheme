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
        <section class="page-container" <?php post_class(); ?>>
            <header class="page-header">
                <h2 class="page-title">
                    <?php the_title(); ?>
                </h2>
            </header>
            <article class="page-content">
                <?php the_content(); ?>
            </article>
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
        </section>
        <?php get_footer(); ?>