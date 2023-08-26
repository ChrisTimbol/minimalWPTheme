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
        This is using single.php
        <h2 class="page-title"><?php the_title(); ?></h2>
        <p class="date-category">
          posted in <?php echo get_the_category_list(', '); ?> on
          <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
            <?php the_time('F j, Y'); ?>
          </a>
          by <?php the_author_posts_link(); ?>
        <p>
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