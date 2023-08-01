<?php get_header() ?>

<main id="primary" class="site-main">

  <?php
  if (have_posts()) {
    /* using if statement allows us to conditionally generate container only if reason too; else no container */
    while (have_posts()) {
      the_post();  // get data ready for each post
  ?>
      <article class="post">

        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div>
          Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y') ?> in <?php echo get_the_category_list(', ') ?>
        </div>

        <p>
          <?php the_content() ?>
        </p>

        <!-- Fix button continue -->
        <a href="" class="continueButton">Continue reading -></a>

      </article>

  <?php
    } /* end of while */
  } /* end of if */
  ?>

</main> <!-- End of content -->

</div>