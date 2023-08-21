<aside class="sidebar">
  <!-- Display Categories -->
  <div class="sidebar-section">
    <h3>Categories</h3>
    <ul>
      <?php
      $args = array(
        'title_li' => '',
        'show_count' => true,
      );
      wp_list_categories($args);
      ?>
    </ul>
  </div>

  <!-- Display Pages -->
  <div class="sidebar-section">
    <h3>Pages</h3>
    <ul>
      <?php
      $args = array(
        'title_li' => '',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
      );
      wp_list_pages($args);
      ?>
    </ul>
  </div>

  <!-- Display Archives -->
  <div class="sidebar-section">
    <h3>Archives</h3>
    <ul>
      <?php wp_get_archives(); ?>
    </ul>
  </div>

  <!-- Display Search Form -->
  <div class="sidebar-section">
    <h3>Search</h3>
    <?php get_search_form(); ?>
  </div>

  <!-- Customizable Widget Area -->
  <div class="sidebar-section">
    <?php if (is_active_sidebar('custom-sidebar')) : ?>
      <?php dynamic_sidebar('custom-sidebar'); ?>
    <?php endif; ?>
  </div>
</aside>