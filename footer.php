<?php
/*
 *  Footer
 */
?>
</main><!-- End of content -->
</div>
<footer class="site-footer">
    <div class="footer-container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - All rights reserved.</p>
        <p><a href="<?php echo esc_url(home_url('/')); ?>privacy-policy">Privacy Policy</a> | <a href="<?php echo esc_url(home_url('/')); ?>terms-and-conditions">Terms &amp; Conditions</a></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>