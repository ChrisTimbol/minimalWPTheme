<!-- <aside id="header-search" class="widget-area"> -->
    <?php if ( ! is_active_sidebar( 'header-search' ) ) : ?> <!-- check if header-search widget area is active -->
        <?php get_search_form(); ?> 
    <?php else : ?>
        <?php dynamic_sidebar( 'header-search' ); ?>
    <?php endif; ?>
<!-- </aside> -->