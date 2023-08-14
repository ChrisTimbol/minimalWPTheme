<?php
/*
 * The template is used for displaying  a single post
 *
 */
get_header();
?>
<main class="e-main">
  <section class="post-container">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post(); // What is the_post? and how does it work?
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
  </section>
<?php get_footer(); ?>