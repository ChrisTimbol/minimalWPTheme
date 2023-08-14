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
        <a class="title" href="<?php echo esc_url(get_permalink()); ?>">
          <?php the_title(); ?>
        </a>
        <p class="post-date-category">
          Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y') ?> in <?php echo get_the_category_list(', ') ?>
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