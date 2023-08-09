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

      <article class="page-post">
        <h2 class="page-title"><?php the_title(); ?></h2>
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