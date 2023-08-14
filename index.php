<?php
/*
  *  Main
  *
  */
get_header()
?>
<section class="blog-container">
  <?php
  if (have_posts()) { /* using if statement allows us to conditionally generate container only if reason too; else no container */
    while (have_posts()) {
      the_post();
  ?>
      <article class="post-container">
        <h2>
          <a class="title" href="<?php echo esc_url(get_permalink()); ?>">
            <?php the_title(); ?>

          </a>
        </h2>
        <p class="post-date-category">
          Posted in <?php echo get_the_category_list(', '); ?> on
          <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
            <?php the_time('F j, Y'); ?>
          </a>
          by <?php the_author_posts_link(); ?>
          <a href="<?php echo esc_url(get_comments_link()); ?>">
            <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
          </a>
        </p>

        <div class="post-description">
          <?php the_excerpt(); ?>
        </div>
        <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
      </article>
  <?php
    } /* end of while */
  } /* end of if */
  ?>

</section> <!-- End of blog-container -->
<?php get_footer(); ?>