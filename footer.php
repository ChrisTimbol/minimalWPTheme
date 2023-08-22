<?php
/*
 *  Footer
 */
?>
</main><!-- End of content -->
<footer class="site-footer">


        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'depth' => 1,
                'menu_class' => 'footer-menu', 
            ));
        }
        ?>
 
</footer>
<?php wp_footer(); ?>
</div>  <!-- End of site-container /div -->
</body>
</html>