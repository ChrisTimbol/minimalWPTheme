<?php
/*
 * The template is used for displaying a single post
 *
 */
get_header();
?>
<section class="single-container">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post(); // Sets up the global post data. More on this below.
  ?>
      <article class="single-article-container" <?php post_class(); ?>>
        <h2 class="post-title" >
          <a ref="<?php echo esc_url(get_permalink()); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
        <div class="post-meta">
          <span class="post-category">posted in <?php echo get_the_category_list(', '); ?> on</span>
          <time class="post-date" datetime="<?php echo get_the_date('c'); ?>">
            on <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
              <?php the_time('F j, Y'); ?>
            </a>
            <span class="post-author">by <?php the_author_posts_link(); ?></span>
            <span class="post-comments">
              <a href="<?php echo esc_url(get_comments_link()); ?>">
                <?php comments_number('0 comments', '1 comment', '% comments'); ?>
              </a>
            </span>

        </div>

        <?php the_content(); ?>
        </p>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php     // Display page links for paginated posts
  wp_link_pages(array(
    'before' => '<div class="page-links">' . esc_html__('Pages:', 'Minimalistic'),
    'after'  => '</div>',
  ));
  ?>
  <?php
  // Include the comments template
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
  ?>
</section>
<?php get_footer(); ?>