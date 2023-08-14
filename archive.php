<?php
get_header();
?>

<main class="archive-container">
    <header class="archive-header">
        <h1 class="archive-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                echo 'Posts by ' . get_the_author();
            } elseif (is_day()) {
                echo 'Archive for ' . get_the_date();
            } elseif (is_month()) {
                echo 'Archive for ' . get_the_date('F Y');
            } elseif (is_year()) {
                echo 'Archive for ' . get_the_date('Y');
            } else {
                echo 'Archives';
            }
            ?>
        </h1>
    </header>

    <section class="archive-posts">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <article class="archive-post">
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="archive-post-meta">
                        Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?>
                    </p>
                    <?php the_excerpt(); ?>
                </article>
                <?php
            }
            the_posts_pagination();
        } else {
            echo '<p>No posts found for this archive.</p>';
        }
        ?>
    </section>
</main>

<?php
get_footer();
?>