<?php
/*
    Default page layout for new pages created
*/
get_header();

if (have_posts()) :
?>
    <main class="page-container">
<?php
    while (have_posts()) : the_post();
?>
        <article <?php post_class(); ?>>
            <header class="page-header">
                <h2 class="page-title"><?php the_title(); ?></h2>
            </header>
            <section class="page-content">
                <?php the_content(); ?>
            </section>
        </article>
<?php
    endwhile;

    // Display page links for paginated posts
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'Minimalistic'),
        'after'  => '</div>',
    ));
?>
    </main>
<?php
else :
    echo '<p>No page found.</p>';
endif;

get_footer();
