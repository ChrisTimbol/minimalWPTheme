<?php
/*
* Template Name: Blog layout no sidebar
*
*/
get_header();
?>
  <main class="blog-container-layout-1">

      <?php $query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 10,
      ));
      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
      ?>
          <article class="post-container">

            <header class="post-header">
              <h2>
                <a class="title" href="<?php echo esc_url(get_permalink()); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>
              <p class="date-category">
                posted in <?php echo get_the_category_list(', '); ?> on
                <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                  <?php the_time('F j, Y'); ?>
                </a>
                by <?php the_author_posts_link(); ?>
                <a href="<?php echo esc_url(get_comments_link()); ?>">
                  <?php comments_number('0 comments', '1 comment', '% comments'); ?>
                </a>
              </p>
            </header>
            <div class="post-description">
              <?php the_excerpt(); ?>
            </div>
            <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
          </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
      // No posts found message
      endif;
      ?>
    </section>
    <?php get_footer(); ?>