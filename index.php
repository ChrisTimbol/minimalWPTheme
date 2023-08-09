<?php
/*
  *  Main
  *
  */
get_header()
?>
<main class="site-main">
  <section class="blog-container">
    <?php
    if (have_posts()) { /* using if statement allows us to conditionally generate container only if reason too; else no container */
      while (have_posts()) {
        the_post();
    ?>
        <article class="post">
          <h2 class="title">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
              <?php the_post_thumbnail(); ?>
            </a>
          </h2>
          <div class="post-details">
            Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y') ?> in <?php echo get_the_category_list(', ') ?>
          </div>

          <div class="post-description">
            <?php the_excerpt() ?>
          </div>
          <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
        </article>
    <?php
      } /* end of while */
    } /* end of if */
    ?>

  </section> <!-- End of blog-container -->
</main> <!-- End of content -->
<?php get_footer(); ?>
