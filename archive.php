<?php
get_header();
?>
<section class="blog-container">
  <header class="archive-header">
    <h2 class="archive-title">
      <?php
      if (is_category()) {
          single_cat_title();
      } elseif (is_tag()) {
          single_tag_title();
      } elseif (is_author()) {
          echo 'Posts by ' . get_the_author();
      } elseif (is_day()) {
          echo 'Archive for <a href="' . esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">' . get_the_date() . '</a>';
      } elseif (is_month()) {
          echo 'Archive for <a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_date('F Y') . '</a>';
      } elseif (is_year()) {
          echo 'Archive for <a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_date('Y') . '</a>';
      } else {
          echo 'Archives';
      }
      ?>
    </h2>
  </header>
  <?php
  if (have_posts()) :
      while (have_posts()) : the_post();
  ?>
          <section class="post-container">
              <header class="post-header">
                  <h2>
                      <a class="title" href="<?php esc_url(the_permalink()); ?>">
                          <?php the_title(); ?>
                      </a>
                  </h2>
                  <p class="date-category">
                      Posted in <?php echo get_the_category_list(', '); ?> on
                      <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                          <?php the_time('F j, Y'); ?>
                      </a>
                      by <?php the_author_posts_link(); ?>
                      <a href="<?php echo esc_url(get_comments_link()); ?>">
                          <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                      </a>
                  </p>
              </header>
              <a class="continueButton" href="<?php the_permalink(); ?>">Continue reading -></a>
          </section>
  <?php
      endwhile;
      the_posts_pagination();
  else: 
      echo '<p>No posts found for this archive.</p>';
  endif;
  ?>
</section>
<?php get_footer(); ?>