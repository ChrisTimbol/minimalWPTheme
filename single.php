<?php
/*
 * The template is used for displaying a single post.
 */
get_header();
?>

<section class="blog-container">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="post-container" <?php post_class(); ?>>
                <div class="single-post-container">
                    <h2 class="post-title">

                        <?php the_title(); ?>

                    </h2>
                    <div class="post-meta">
                        <span class="post-category">posted in <?php echo get_the_category_list(', '); ?> on</span>
                        <time class="post-date" datetime="<?php echo get_the_date('c'); ?>">
                            on <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                                <?php the_time('F j, Y'); ?>
                            </a>
                            <span class="post-author">by <?php the_author_posts_link(); ?></span>
                            <div class="post-comments">
                                <a href="<?php echo esc_url(get_comments_link()); ?>">
                                    <?php comments_number('0 comments', '1 comment', '% comments'); ?>
                                </a>
                            </div>
                    </div>
                    <div class="post-description">
                        <?php the_content(); ?>
                    </div>
                    <div>
                        <?php wp_link_pages(); ?><!-- enables paginated posts quicktag -->
                    </div>
                </div>
                <div class="post-comments">
                    <?php
                    // Include the comments template
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>


            </article>


        <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>