<?php
/*
 * The template is used for displaying  pages on your site.
 *
 */
get_header();
?>
<main class="page-main">
  <section class="page-container">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
    ?>
        <article class="page-post">
            THIS IS SINGLE.PHP
          <h2 class="page-title"><?php the_title(); ?></h2>
          <div class="page-details">
            posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?>
          </div>
          <p>
            <?php the_content(); ?>
          </p>
        </article>
    <?php
      } /* end of while */
    } /* end of if */
    ?>
  </section>
</main><!-- End of content -->
<?php get_footer(); ?>
</div><!-- End of page-wrapper from header.php  -->