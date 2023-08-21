<?php
/*
 *  Footer
 */
?>
</main><!-- End of content -->
</div>
<footer class="site-footer">


        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'depth' => 1,
                'menu_class' => 'footer-menu', // Add this line
            ));
        }
        ?>
 
</footer>
<?php wp_footer(); ?>
</body>

</html>