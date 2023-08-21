<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <div class="page-container">
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
    </section>
        </div>
        <?php get_footer(); ?>