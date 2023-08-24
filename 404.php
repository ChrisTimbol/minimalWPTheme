<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

<section class="four-container">

        <h1 class="title">Oops! Page Not Found</h1>
        <p>It looks like the page you're trying to reach doesn't exist or has been moved. Please use the navigation menu to find what you're looking for, or try searching the site:</p>
        
        <span class="search-container navlinks">
                <?php get_search_form(); ?>
        </span> 
        <!-- Link to Home Page -->
        <p>Or, you can simply <a class="backHome" href="<?php echo esc_url(home_url('/')); ?>">return to the homepage</a>.</p>

</section>

<?php get_footer(); ?>