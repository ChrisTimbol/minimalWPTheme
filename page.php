<?php
/*
 * The template is used for displaying  pages on your site.
 *
 */
get_header();
?>
<section class="page-container">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
  ?>
        <h2 class="title">
          <?php the_title(); ?>
        </h2>
        <p>
          <?php the_content(); ?>
        </p>
  <?php
    } /* end of while */
  } /* end of if */
  ?>
</section>
</main><!-- End of content -->
<?php get_footer(); ?>