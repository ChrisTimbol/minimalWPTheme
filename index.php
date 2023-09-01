<?php
/*
  *  Main
  *
  */
get_header();
?>
<main class="blog-container">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
  ?>
      <article class="post-container">
        <header class="post-header">
          <h2 class="post-title">
            <a href="<?php echo esc_url(get_permalink()); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
          <div class="post-meta">
            <span class="post-category">posted in <?php echo get_the_category_list(', '); ?> </span>
            <time class="post-date" datetime="<?php echo get_the_date('c'); ?>">
            &nbspon <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                <?php the_time('F j, Y'); ?>
              </a>
              <span class="post-author">by <?php the_author_posts_link(); ?></span>
              <div class="post-comments">
                <a href="<?php echo esc_url(get_comments_link()); ?>">
                  <?php comments_number('0 comments', '1 comment', '% comments'); ?>
                </a>
              </div>
          </div>

        </header>
        <div class="post-description">
          <?php the_excerpt(); ?>
        </div>
        <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
      </article>

  <?php
    endwhile;
  endif;
  ?>
  <div class="pagination-wrapper">
    <?php
    the_posts_pagination(array(
      'mid_size'           => 2,
      'prev_text'          => __('&laquo; Previous', 'minimalistic'),
      'next_text'          => __('Next &raquo;', 'minimalistic'),
      'screen_reader_text' => __('Posts Navigation', 'minimalistic'),
      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'minimalistic') . ' </span>',
    ));
    ?>
  </div>

</main>
<?php get_footer(); ?>