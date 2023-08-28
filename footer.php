<?php
/*
  Footer
*/
?>
<footer class="site-footer">
    <?php
    // Check if the footer menu is set and display it
    if (has_nav_menu('footer-menu')) :
        echo wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container'      => false,
            'depth'          => 1,
            'menu_class'     => 'footer-menu',
        ]);
    endif;
    ?>
</footer>

<?php wp_footer(); ?>
</div> <!-- End of site-container -->
</body>

</html>