<?php
/*
 * The template is used for displaying a single post
 *
 */
get_header();
?>
<main class="e-main">
  <section class="post-container">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post(); // Sets up the global post data. More on this below.
    ?>
        <article class="page-post">
            This is using single.php
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

    <?php
    // Include the comments template
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>
  </section>
</main>
<?php get_footer(); ?>